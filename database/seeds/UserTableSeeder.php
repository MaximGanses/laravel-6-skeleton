<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'admin',
            ];

        User::create($data);
    }
}
