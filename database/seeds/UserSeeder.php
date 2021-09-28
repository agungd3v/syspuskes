<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Administrator',
        'email' => 'admin@syspuskes.com',
        'email_verified_at' => now(),
        'password' => Hash::make('syspuskes'),
        'role' => 'admin',
        'created_at' => now(),
        'updated_at' => now()
      ]);
    }
}
