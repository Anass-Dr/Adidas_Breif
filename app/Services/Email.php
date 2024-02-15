<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class Email {
    public static function send (User $user, string $link) {
        Mail::to($user->email)->send(new ResetPasswordMail($link));
    }
}
