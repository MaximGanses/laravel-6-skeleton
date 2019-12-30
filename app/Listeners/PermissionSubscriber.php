<?php

namespace App\Listeners;

use App\Events\PermissionMadeEvent;
use App\Events\PermissionRemovedEvent;
use App\Max\Slack\MaxSlack;
use Illuminate\Contracts\Queue\ShouldQueue;

class PermissionSubscriber implements ShouldQueue
{
    private $slack;

    public function __construct()
    {
        $this->slack = new MaxSlack();
    }

    /**
     * Handle user login events.
     */
    public function handlePermissionMade(PermissionMadeEvent $event): void
    {
        $this->slack->sendSlackMessage('New permission made');
        $event->permission->save();
    }

    /**
     * Handle user logout events.
     */
    public function handlePermissionRemoved(PermissionRemovedEvent $event): void
    {
        $this->slack->sendSlackMessage(sprintf('Permission %s has been deleted', $event->permission->name));
        $event->permission->delete();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            PermissionMadeEvent::class,
            'App\Listeners\PermissionSubscriber@handlePermissionMade'
        );

        $events->listen(
            PermissionRemovedEvent::class,
            'App\Listeners\PermissionSubscriber@handlePermissionRemoved'
        );
    }
}
