<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(App\User::class, 50)->create();
        factory(Spatie\Permission\Models\Permission::class, 10)->create();
        factory(Spatie\Permission\Models\Role::class, 10)->create();
    }
}
