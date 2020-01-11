<?php


namespace App\Repositories;


use App\Exceptions\UserException;
use App\User;
use Spatie\Permission\Models\Role;

class UserRepository
{
    /**
     * @param User $user
     * @param array $roles
     * @throws UserException
     */
    public function updateRoles(User $user, $roles)
    {
        /** @var Role[] $roles */
        $rolesArray = Role::whereIn($roles)->get();

        if (count($rolesArray) === 0 || false === ($rolesArray[0] instanceof Role))
        {
            throw UserException::RoleNotFound();
        }

        $user->assignRole($rolesArray);
    }

    public function createUser($request): void
    {
        User::create([$request]);
    }

    public function removeUser(User $user)
    {
        $user->delete();
    }
}