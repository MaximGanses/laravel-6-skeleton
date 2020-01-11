<?php

namespace App\Listeners;

use App\Events\PermissionMadeEvent;
use App\Events\PermissionRemovedEvent;
use App\Max\Slack\MaxSlack;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;

class PermissionSubscriber implements ShouldQueue
{
    /** @var MaxSlack  */
    private $slack;

    public function __construct()
    {
        $this->slack = new MaxSlack();
    }

    /**
     * @param PermissionMadeEvent $event
     */
    public function handlePermissionMade(PermissionMadeEvent $event): void
    {
        $this->slack->sendSlackMessage('New permission made');
        $event->permission->save();
    }

    /**
     * @param PermissionRemovedEvent $event
     * @throws Exception
     */
    public function handlePermissionRemoved(PermissionRemovedEvent $event): void
    {
        $this->slack->sendSlackMessage(sprintf('Permission %s has been deleted', $event->permission->name));
        $event->permission->delete();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe($events): void
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
