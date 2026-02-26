<?php

namespace App\Livewire;

use App\Mail\ContactFormSubmission;
use App\Models\ContactSubmission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Throwable;

#[Layout('layouts.app')]
class ContactPage extends Component
{
    public string $seoTitle = 'Contact Codikal | Software Project Inquiry';
    public string $seoDescription = 'Contact Codikal for web development, mobile apps, SaaS solutions, and API integration services.';
    public string $seoKeywords = 'contact software development company, contact Codikal, project inquiry, web app development quote';

    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $company = '';
    public string $service = '';
    public string $message = '';

    public bool $submitted = false;

    public function submit(): void
    {
        $submissionId = (string) Str::uuid();

        Log::info('contact_form.submit.started', [
            'submission_id' => $submissionId,
            'queue_connection' => config('queue.default'),
            'mail_mailer' => config('mail.default'),
        ]);

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:40'],
            'company' => ['nullable', 'string', 'max:120'],
            'service' => ['required', 'string', 'max:120'],
            'message' => ['required', 'string', 'min:15', 'max:3000'],
        ]);

        Log::info('contact_form.submit.validated', [
            'submission_id' => $submissionId,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'service' => $validated['service'],
            'message_length' => mb_strlen($validated['message']),
        ]);

        $submission = ContactSubmission::create([
            'submission_uuid' => $submissionId,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'service' => $validated['service'],
            'message' => $validated['message'],
            'mail_status' => 'pending',
        ]);

        Log::info('contact_form.submission.saved', [
            'submission_id' => $submissionId,
            'db_id' => $submission->id,
        ]);

        try {
            Mail::to('hello@codikal.com')->queue(new ContactFormSubmission($validated));
            Log::info('contact_form.mail.admin_queued', [
                'submission_id' => $submissionId,
                'to' => env('CONTACT_EMAIL'),
            ]);

            $submission->forceFill([
                'mail_status' => 'queued',
                'mail_error' => null,
            ])->save();

            $this->reset(['name', 'email', 'phone', 'company', 'service', 'message']);
            $this->submitted = true;

            Log::info('contact_form.submit.completed', [
                'submission_id' => $submissionId,
                'status' => 'queued',
            ]);
        } catch (Throwable $exception) {
            Log::error('contact_form.submit.failed', [
                'submission_id' => $submissionId,
                'error' => $exception->getMessage(),
                'exception' => get_class($exception),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            $submission->forceFill([
                'mail_status' => 'failed',
                'mail_error' => Str::limit($exception->getMessage(), 1800),
            ])->save();

            report($exception);
            $this->addError('form', 'We could not send your message right now. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.contact-page', [
            'seoTitle' => $this->seoTitle,
            'seoDescription' => $this->seoDescription,
            'seoKeywords' => $this->seoKeywords,
            'canonicalUrl' => route('contact'),
            'ogImage' => asset('images/codikal-logo.png'),
        ]);
    }
}
