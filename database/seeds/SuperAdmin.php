<?php

use Illuminate\Database\Seeder;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'SuperAdmin',
            'last_name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('SuperAdmin123'),
            'role' => 9,
            'avatar' => 'dafault.jpeg'
        ]);
    }
}
