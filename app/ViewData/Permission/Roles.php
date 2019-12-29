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

    /** Roles[] */
    public static function createDashboardDTO($roles): self
    {
        $dto = new Roles();
        $dto->roles = $roles;
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
                'total' => sprintf('%s user(s) have this role', count($this->getDeleteAbleUsers($role))),
                'add' => $this->getAvailableUsers($role),
                'delete' => $this->getDeleteAbleUsers($role),
                'permissions' => $this->getPermissions($role),
                'permission_list' => $this->getPermissionList($role)
            ];
        }
        return $render;
    }

    private function getAvailableUsers(Role $role)
    {
        /** @var User[] $nonmembers */
        $nonmembers = User::all()->reject(function ($user) use ($role) {
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

    private function getDeleteAbleUsers(Role $role)
    {
        $users = $role->users()->getResults();
        $array = [];
        foreach ($users as $user) {
            $array[] =
                [
                    'url' => sprintf('roles/%s/%s/delete', $role->id, $user->id),
                    'name' => $user->name
                ];
        }
        return $array;
    }

    private function getPermissions(Role $role)
    {
        $arr = [];
        foreach (Permission::all() as $permission) {
            $arr[] = [
                'url' => sprintf('roles/permission/%s/%s', $permission->id, $role->id),
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