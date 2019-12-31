<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Spatie\Permission\Models\Permission;

class PermissionMadeEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Permission */
    public $permission;

    /**
     * Create a new event instance.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->permission = Permission::create(['name' => $name]);
    }
}
