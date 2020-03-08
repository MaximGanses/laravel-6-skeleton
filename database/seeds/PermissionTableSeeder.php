<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create($this->createPermission('write'));
        Permission::create($this->createPermission('edit'));
        Permission::create($this->createPermission('read'));
        Permission::create($this->createPermission('none'));
    }

    private function createPermission($name)
    {
        return ['name'=>$name];
    }
}
