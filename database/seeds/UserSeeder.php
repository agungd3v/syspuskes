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
        'name' => 'Gudang',
        'email' => 'gudang@puskesmastejoagung.com',
        'email_verified_at' => now(),
        'password' => Hash::make('puskesmastejoagung'),
        'role' => 'gudang',
        'created_at' => now(),
        'updated_at' => now()
      ]);
      DB::table('users')->insert([
        'name' => 'Apotik',
        'email' => 'apotik@puskesmastejoagung.com',
        'email_verified_at' => now(),
        'password' => Hash::make('puskesmastejoagung'),
        'role' => 'apotik',
        'created_at' => now(),
        'updated_at' => now()
      ]);
    }
}
