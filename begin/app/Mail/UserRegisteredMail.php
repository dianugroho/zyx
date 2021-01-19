<?php

namespace App\Mail;

use App\Models\User;
use App\Models\OtpCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, OtpCode $otpCode, $sender)
    {
        $this->sender = $sender;
        $this->user = $user;
        $this->otpCode = $otpCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sender)
            ->view('mail/send-mail-user-registered')->with([
                'name' => $this->user->name,
                'otp_code' => $this->otpCode->otp_code,
            ]);
    }
}
