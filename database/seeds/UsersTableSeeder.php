<?php

use App\Models\User;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'Mr. Admin',
                'user_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'role_id' => 2,
                'name' => 'Mr. Author',
                'user_name' => 'author',
                'email' => 'author@gmail.com',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach($users as $key => $user) {
            User::create($user);
        }
    }
}
