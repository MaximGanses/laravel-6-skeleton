<?php

namespace App\Listeners;

use App\Events\RoleMadeEvent;
use App\Events\RoleRemovedEvent;
use App\Max\Slack\MaxSlack;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;

class RoleSubscriber implements ShouldQueue
{
    /** @var MaxSlack  */
    private $slack;

    public function __construct()
    {
        $this->slack = new MaxSlack();
    }

    /**
     * @param RoleMadeEvent $event
     */
    public function handleRoleMade(RoleMadeEvent $event): void
    {
        $this->slack->sendSlackMessage('New role made');
        $event->role->save();
    }

    /**
     * @param RoleRemovedEvent $event
     * @throws Exception
     */
    public function handleRoleRemoved(RoleRemovedEvent $event): void
    {
        $this->slack->sendSlackMessage(sprintf('Role %s has been deleted', $event->role->name));
        $event->role->delete();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe($events): void
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
