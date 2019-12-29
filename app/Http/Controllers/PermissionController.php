<?php

namespace App\Http\Controllers;

use App\User;
use App\ViewData\Permission\Dashboard;
use App\ViewData\Permission\Permissions;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Request;

class PermissionController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function indexAction()
    {
        /** @var Dashboard $dto */
        $dto = Dashboard::createDashboardDTO(Role::count(), User::count(), Permission::count());
        return view('permissions.index', ['info' => $dto->render]);
    }


    public function permissionIndexAction()
    {
        $dto = Permissions::createDashboardDTO(Permission::all());
        return view('permissions.permissions', ['info' => $dto->render]);
    }


    public function deleteRoleFromPermissionAction(Permission $permission, Role $role)
    {
        $permission->removeRole($role);
        return back()->withInput();
    }


    public function createPermissionAction()
    {
        if ($this->request->getMethod() === 'POST') {
            Permission::create(['name' => $this->request->input('name')]);
            return back()->withInput();
        }
        return back();
    }

    public function addPermissionToUserAction(Permission $permission, User $user)
    {
        $user->givePermissionTo($permission);
        return back()->withInput();
    }

    public function assignRoleToPermission(Role $role, Permission $permission)
    {
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
        return back()->withInput();
    }

    public function assignPermissionToRole(Permission $permission, Role $role)
    {
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
        return back()->withInput();
    }

    public function removeRoleFromPermission(Role $role, Permission $permission)
    {
        $permission->removeRole($role);
        return back()->withInput();
    }

}
