<?php

namespace App\Jobs;

use App\Events\UserLoggedInEvent;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserLoggedIn implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var UserLoggedInEvent
     */
    private $event;

    /**
     * Create a new job instance.
     *
     * @param UserLoggedInEvent $event
     */
    public function __construct(UserLoggedInEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->event->user->update([
            'last_login_date' => Carbon::now()->toDateTime(),
            'ip_address' => $this->event->ip
        ]);
        $this->event->user->save();
    }
}
