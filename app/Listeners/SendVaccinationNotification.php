<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Events\VaccinationRegistered;
use App\Mail\VaccinationNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVaccinationNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VaccinationRegistered $event): void
    {
        Log::channel('single')->info("Listeners");

        $registration = $event->registration;
        $user = $registration->user;

        Mail::to($user->email)->send(new VaccinationNotification($registration));
    }
}
