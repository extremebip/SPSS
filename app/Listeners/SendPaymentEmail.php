<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Mail\SendPayment;
use App\Jobs\SendEmail;

class SendPaymentEmail
{
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
     * @param  Verified  $event
     * @return void
     */
    public function handle(Verified $event)
    {
        $mail = new SendPayment($event->user);
        Mail::to($event->user)->send($mail);
        // Uncomment below if queue are possible
        // SendEmail::dispatch($mail, $event->user);
    }
}
