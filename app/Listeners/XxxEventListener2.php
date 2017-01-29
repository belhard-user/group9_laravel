<?php

namespace App\Listeners;

use App\Events\XxxEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class XxxEventListener2
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
     * @param  XxxEvent  $event
     * @return void
     */
    public function handle(XxxEvent $event)
    {
        dump($event);
    }
}
