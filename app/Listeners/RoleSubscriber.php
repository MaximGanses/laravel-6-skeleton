<?php

namespace App\Listeners;

use App\Events\RoleMadeEvent;
use App\Events\RoleRemovedEvent;
use App\Max\Slack\MaxSlack;
use Illuminate\Contracts\Queue\ShouldQueue;

class RoleSubscriber implements ShouldQueue
{
    private $slack;

    public function __construct()
    {
        $this->slack = new MaxSlack();
    }

    /**
     * Handle user login events.
     */
    public function handleRoleMade(RoleMadeEvent $event): void
    {
        $this->slack->sendSlackMessage('New role made');
        $event->role->save();
    }

    /**
     * Handle user logout events.
     */
    public function handleRoleRemoved(RoleRemovedEvent $event): void
    {
        $this->slack->sendSlackMessage(sprintf('Role %s has been deleted', $event->role->name));
        $event->role->delete();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            RoleMadeEvent::class,
            'App\Listeners\RoleSubscriber@handleRoleMade'
        );

        $events->listen(
            RoleRemovedEvent::class,
            'App\Listeners\RoleSubscriber@handleRoleRemoved'
        );
    }
}
