<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'TestName';
        $user->email = 'TestEmail';
        $user->password = 'TestPassword';
        $user->save();



        $users = [
            [
                'name' => 'Jonas',
                'email' => 'jonas@gmail.com',
                'password' => bcrypt('pass'),
                'role' => 'user'
            ],
            [
                'name' => 'Zirgas',
                'email' => 'zirgas@gmail.com',
                'password' => bcrypt('pass'),
                'role' => 'admin'
            ],
        ];

        foreach ($users as $user_data) {
            $user = new User();
            $user->name = $user_data['name'];
            $user->email = $user_data['email'];
            $user->password = $user_data['password'];

            $role = Role::where('name', $user_data['role'])->first();
            // ->attach for a many-to-many relationship

            // Column which stores the id of role
            // is assumed to be <lowercase class name>_id
            $user->role()->associate($role);
            $user->save();
        }
    }
}
