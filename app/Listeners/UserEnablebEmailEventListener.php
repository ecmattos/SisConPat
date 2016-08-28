<?php

namespace SisConPat\Listeners;

use SisConPat\Events\UserEnabledEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEnabledEmailEventListener
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
     * @param  UserEnabledEvent  $event
     * @return void
     */
    public function handle(UserEnabledEvent $event)
    {
        //
    }
}
