<?php

namespace App\Listeners;

use App\Events\RoleMadeEvent;
use App\Events\RoleRemovedEvent;
use App\Events\UserLoggedInEvent;
use App\Max\Slack\MaxSlack;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;

class UserSubscriber implements ShouldQueue
{

    /**
     * @param UserLoggedInEvent $event
     */
    public function handleLoggedIn(UserLoggedInEvent $event): void
    {
        $event->user->update([
            'last_login_date' => Carbon::now()->toDateTime(),
            'ip_address' => $event->ip
        ]);
        $event->user->save();
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe($events): void
    {
        $events->listen(
            UserLoggedInEvent::class,
            'App\Listeners\UserSubscriber@handleLoggedIn'
        );
    }
}
