<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Spatie\Permission\Models\Role;

class RoleRemovedEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Role  */
    public $role;

    /**
     * Create a new event instance.
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
}
