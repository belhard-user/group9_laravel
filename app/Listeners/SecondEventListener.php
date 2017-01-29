<?php

namespace App\Listeners;

use App\Events\SecondEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SecondEventListener
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
     * @param  SecondEvent  $event
     * @return void
     */
    public function handle(SecondEvent $event)
    {
        //
    }
}
