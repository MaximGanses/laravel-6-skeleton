<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create($this->createPermission('super_admin'));
        Role::create($this->createPermission('admin'));
        Role::create($this->createPermission('user'));
    }

    private function createPermission($name)
    {
        return ['name'=>$name];
    }
}
