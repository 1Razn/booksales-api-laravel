<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GenreSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('genres')->insert([
      [
        'name' => 'Fiction',
        'description' => 'Imaginative stories created from the authors creativity.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Fantasy',
        'description' => 'Stories featuring magical elements and mythical creatures.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Mystery',
        'description' => 'Narratives centered around solving a crime or uncovering secrets.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Science Fiction',
        'description' => 'Stories that explore futuristic technologies and concepts.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Horror',
        'description' => 'Stories that are intended to scare and frighten the reader.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
