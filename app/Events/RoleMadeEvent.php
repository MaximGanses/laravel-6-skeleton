<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Spatie\Permission\Models\Role;

class RoleMadeEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Role */
    public $role;

    /**
     * Create a new event instance.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->role = Role::create(['name' => $name]);
    }
}
