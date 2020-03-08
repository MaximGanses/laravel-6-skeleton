<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = 10;

        for ($i = 1; $i <= $amount; $i++ )
        {
            $data =
                [
                    'name' => sprintf('admin%s', $i),
                    'email' => sprintf('admin%s@admin.com', $i),
                    'password' => Hash::make('admin'),
                ];

            User::create($data);
        }
    }
}
