<?php


namespace App\ViewData\Permission;


class Dashboard
{
    /** @var int */
    public $roles;

    /** @var int */
    public $users;

    /** @var int */
    public $permissions;

    /** @var array | mixed */
    public $render;


    public static function createDashboardDTO(int $roles, int $users, int $permissions): self
    {
        $dto = new self();
        $dto->roles = $roles;
        $dto->users = $users;
        $dto->permissions = $permissions;
        $dto->render = $dto->renderData($roles, $users, $permissions);
        return $dto;
    }

    private function renderData($roleTotal, $userTotal, $permissionTotal): array
    {
        $array[] =  $this->createRoleInfo($roleTotal);
        $array[] =  $this->createUserInfo($userTotal);
        $array[] = $this->createPermissionInfo($permissionTotal);
        return $array;
    }

    private function createRoleInfo(int $total): array
    {
        return $this->createDTOArray('Roles', 'Desc', $total, route('permission.roles'));
    }

    private function createUserInfo(int $total): array
    {
        return $this->createDTOArray('Users', 'Desc', $total, route('permission.index'));
    }

    private function createPermissionInfo(int $total): array
    {
        return $this->createDTOArray('Permissions', 'Desc', $total, route('permission.permission'));
    }

    private function createDTOArray(string $title, string $desc, int $total, string $route): array
    {
        return [
            'title' => $title,
            'desc' => $desc,
            'total' => $total,
            'url' => $route,
        ];
    }
}