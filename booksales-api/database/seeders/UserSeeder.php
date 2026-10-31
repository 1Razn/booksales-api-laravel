<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert([
      [
        'name' => 'Admin User',
        'email' => 'admin@bookstore.com',
        'password' => Hash::make('password123'),
        'role' => 'Admin',
        'last_access' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Customer User',
        'email' => 'customer@bookstore.com',
        'password' => Hash::make('password123'),
        'role' => 'Customer',
        'last_access' => null,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
