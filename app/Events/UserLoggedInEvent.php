<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Spatie\Permission\Models\Role;

class UserLoggedInEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var User  */
    public $user;

    /** @var string */
    public $ip;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Request $request
     */
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->ip = $request->ip();
    }
}
