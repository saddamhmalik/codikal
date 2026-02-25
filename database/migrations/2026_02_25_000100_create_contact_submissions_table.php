<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->uuid('submission_uuid')->unique();
            $table->string('name', 100);
            $table->string('email', 150);
            $table->string('phone', 40)->nullable();
            $table->string('company', 120)->nullable();
            $table->string('service', 120);
            $table->text('message');
            $table->string('mail_status', 20)->default('pending');
            $table->text('mail_error')->nullable();
            $table->timestamps();

            $table->index(['email', 'created_at']);
            $table->index(['mail_status', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
