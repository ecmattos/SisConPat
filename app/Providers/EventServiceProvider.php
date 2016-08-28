<?php

namespace SisConPat\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'SisConPat\Events\UserNewEvent' => 
        [
            'SisConPat\Listeners\UserNewEmailEventListener',
            'SisConPat\Listeners\UserNewEmailToAdminEventListener',
        ],

        'SisConPat\Events\UserEnabledEvent' => 
        [
            'SisConPat\Listeners\UserEnabledEmailEventListener',
        ],

        'SisConPat\Events\UserDisabledEvent' => 
        [
            'SisConPat\Listeners\UserDisabledEmailEventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
