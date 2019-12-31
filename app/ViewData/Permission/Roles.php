<?php


namespace App\ViewData\Permission;


use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles
{
    /** @var int */
    public $roles;

    /** @var array | mixed */
    public $render;

    /** @var User[] */
    public $users;

    /** @var Permission[] */
    public $permissions;

    /** Roles[] */
    public static function createDashboardDTO($roles): self
    {
        $dto = new Roles();
        $dto->roles = $roles;
        $dto->users = User::all();
        $dto->permissions = Permission::all();
        $dto->render = $dto->renderData($roles);
        return $dto;
    }

    /** @param Role[] $roles */
    private function renderData($roles): array
    {
        $render = [];
        foreach ($roles as $role) {
            $render[] = [
                'id' => $role->id,
                'name' => $role->name,
                'created' => $role->created_at,
                'total' => sprintf('%s user(s) have this role', count($this->getDeleteAblePermissions($role))),
                'add' => $this->getAvailableUsers($role),
                'delete' => $this->getDeleteAblePermissions($role),
                'permissions' => $this->getPermissions($role),
                'permission_list' => $this->getPermissionList($role)
            ];
        }
        return $render;
    }

    private function getAvailableUsers(Role $role)
    {
        /** @var User[] $nonmembers */
        $nonmembers = $this->users->reject(function ($user) use ($role) {
            return $user->hasRole($role->name);
        });

        $array = [];
        foreach ($nonmembers as $user) {
            $array[] =
                [
                    'url' => sprintf('roles/%s/%s', $role->id, $user->id),
                    'name' => $user->name
                ];
        }
        return $array;
    }

    private function getDeleteAblePermissions(Role $role)
    {
        $permissions = $role->permissions()->getResults();
        $array = [];
        foreach ($permissions as $permission) {
            $array[] =
                [
                    'url' => sprintf('roles/%s/%s/remove', $role->id, $permission->id),
                    'name' => $permission->name
                ];
        }
        return $array;
    }

    private function getPermissions(Role $role)
    {
        $arr = [];
        $permissions = $this->permissions->reject(function (Permission $permission) use ($role) {
            return $permission->hasRole($role->name);
        });
        foreach ($permissions as $permission) {
            $arr[] = [
                'url' => sprintf('permissions/%s/%s', $permission->id, $role->id),
                'name' => $permission->name,
            ];
        }
        return $arr;
    }

    private function getPermissionList(Role $role)
    {
        $arr = [];
        $permissions = $role->permissions()->getResults();

        foreach ($permissions as $permission) {
            $arr[] =
                $permission->name;
        }
        return $arr;
    }
}