<?php

namespace App\Http\Controllers;

use App\User;
use App\ViewData\Permission\Roles;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Request;

class RoleController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function roleIndexAction()
    {
        $dto = Roles::createDashboardDTO(Role::all());
        return view('permissions.roles', ['info' => $dto->render]);
    }

    public function addRoleToUserAction(Role $role, User $user)
    {
        $user->assignRole($role);
        return back()->withInput();
    }

    public function deleteRoleFromUserAction(Role $role, User $user)
    {
        $user->removeRole($role);
        return back()->withInput();
    }

    public function createRoleAction()
    {
        if ($this->request->getMethod() === 'POST') {
            Role::create(['name' => $this->request->input('name')]);

            return back()->withInput();
        }
        return back();
    }

    public function deleteRoleAction(Role $role)
    {
        $role->delete();
        return back()->withInput();
    }
}