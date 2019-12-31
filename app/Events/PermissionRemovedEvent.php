<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Spatie\Permission\Models\Permission;

class PermissionRemovedEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Permission */
    public $permission;

    /**
     * Create a new event instance.
     *
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
}
