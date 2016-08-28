<?php

namespace SisConPat\Events;

use SisConPat\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserEnabledEvent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    private $user_new;

    public function __construct($user_new)
    {
        $this->user_new = $user_new;
    }

    public function getUser()
    {
        return $this->user_new;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
