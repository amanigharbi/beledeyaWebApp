<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Super Admin User
        DB::table('users')->insert([
            'name' => 'super admin',
            'email' => 'admin@admin.com',
            'emailConfirmed' => 'true',
            'password' => '$2y$10$7/Bqh2o8Ev6Qfqn5yfa1rO/pf4iyOudu.Kcb5gaBFH9OPYa3JZjci', // 123456789
            'role' => "admin",
        ]);

        // Create User
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'emailConfirmed' => 'true',
            'password' => '$2y$10$7/Bqh2o8Ev6Qfqn5yfa1rO/pf4iyOudu.Kcb5gaBFH9OPYa3JZjci', // 123456789
            'role' => "user",
        ]);
    }
}
