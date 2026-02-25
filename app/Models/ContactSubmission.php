<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'submission_uuid',
        'name',
        'email',
        'phone',
        'company',
        'service',
        'message',
        'mail_status',
        'mail_error',
    ];
}
