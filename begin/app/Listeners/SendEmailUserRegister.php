<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisteredMail;
use App\Events\UserRegisteredEvent;


class SendEmailUserRegister implements ShouldQueue
{
    // use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserRegisteredEvent $event)
    {
        Mail::to($event->user->email)->send(new UserRegisteredMail($event->user, $event->otpCode, $event->sender));
    }

    public $afterCommit = true;
}
