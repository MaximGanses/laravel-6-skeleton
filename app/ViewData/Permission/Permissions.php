<?php


namespace App\ViewData\Permission;


use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions
{
    /** @var int */
    public $permissions;

    /** @var array | mixed */
    public $render;

    /** Roles[] */
    public static function createDashboardDTO($permissions): self
    {
        $dto = new Permissions();
        $dto->permissions = $permissions;
        $dto->render = $dto->renderData($permissions);
        return $dto;
    }

    /** @param Role[] $roles */
    private function renderData($permissions): array
    {
        $render = [];
        foreach ($permissions as $permission) {
            $render[] = [
                'id' => $permission->id,
                'name' => $permission->name,
                'created' => $permission->created_at,
                'total' => sprintf('%s role(s) have this permission', count($this->getDeleteAbleRoles($permission))),
                'add' => $this->getAvailableRoles($permission),
                'delete' => $this->getDeleteAbleRoles($permission)
            ];
        }
        return $render;
    }

    private function getAvailableRoles(Permission $permission)
    {
        /** @var User[] $nonmembers */
        $nonmembers = Role::all()->reject(function (Role $role) use ($permission) {
            return $role->hasPermissionTo($permission);
        });

        $array = [];
        foreach ($nonmembers as $role) {
            $array[] =
                [
                    'url' => sprintf('permissions/%s/%s', $permission->id, $role->id),
                    'name' => $role->name
                ];
        }
        return $array;
    }

    private function getDeleteAbleRoles(Permission $permission)
    {
        $roles = Role::all()->filter(function (Role $role) use ($permission) {
            return $role->hasPermissionTo($permission);
        });

        $array = [];
        foreach ($roles as $role) {
            $array[] =
                [
                    'url' => sprintf('permissions/%s/%s/delete', $permission->id, $role->id),
                    'name' => $role->name
                ];
        }
        return $array;
    }
}