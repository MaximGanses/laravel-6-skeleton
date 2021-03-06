<?php

namespace App\Http\Controllers;

use App\Exceptions\UserException;
use App\Repositories\UserRepository;
use App\User;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    private $request;
    private const USERS_PER_PAGE = 10;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function indexAction()
    {
        return view('permissions.users', ['users' => User::paginate(self::USERS_PER_PAGE), 'roles' => Role::all()]);
    }

    public function createUserAction(UserRepository $repository)
    {
        $repository->createUser($this->request->except('token'));
    }

    public function removeUserAction(User $user, UserRepository $userRepository)
    {
        $userRepository->removeUser($user);
    }

    public function updateRolesToUserAction(UserRepository $repository)
    {
        $roles = $this->request->input('roles');
        $user = User::findOrFail($this->request->input('user'));

        try {
            $repository->updateRoles($user, $roles);
        } catch (UserException $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    public function editAction()
    {
        try {
            $user = User::findOrFail($this->request->input('id'));
            $user->update($this->request->input());
            $user->save();
            return back()->withInput();
        } catch (\Exception $exception) {
            return back()->withInput();
        }
    }

    public function createAction()
    {
        User::create($this->request->input());
        return back()->withInput();
    }

    public function deleteAction()
    {
        try {
            $user = User::findOrFail($this->request->input('id'));
            $user->delete();
        } catch (\Throwable $exception) {
            return back()->withInput();
        }

        return back()->withInput();
    }

    public function addRoleToUserAction()
    {
        $roles = Role::whereIn('id', $this->request->input('roles'))->get();

        /** @var User $user */
        $user = User::findOrFail($this->request->input('id'));
        $user->assignRole($roles);
        return back()->withInput();
    }

    public function removeRoleFromUserAction(User $user, Role $role)
    {
        $user->removeRole($role);
        return back()->withInput();
    }
}
