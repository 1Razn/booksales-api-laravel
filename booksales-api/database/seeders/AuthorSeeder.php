<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('authors')->insert([
      [
        'name' => 'J.K. Rowling',
        'photo' => 'jk_rowling.jpg',
        'bio' => 'British author, best known for the Harry Potter series.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'George R.R. Martin',
        'photo' => 'george_rr_martin.jpg',
        'bio' => 'American author, best known for the A Song of Ice and Fire series.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Isaac Asimov',
        'photo' => 'isaac_asimov.jpg',
        'bio' => 'American author, best known for the Foundation series and science fiction works.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Agatha Christie',
        'photo' => 'agatha_christie.jpg',
        'bio' => 'British author, best known for her detective novels featuring Hercule Poirot and Miss Marple.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Stephen King',
        'photo' => 'stephen_king.jpg',
        'bio' => 'American author, best known for his horror and supernatural fiction novels.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
