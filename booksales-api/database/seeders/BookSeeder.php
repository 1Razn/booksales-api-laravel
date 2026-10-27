<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('books')->insert([
      [
        'title' => 'Harry Potter and the Sorcerer\'s Stone',
        'author_id' => 1,
        'genre_id' => 2,
        'price' => 150000,
        'stock' => 50,
        'description' => 'A young wizard begins his journey at Hogwarts School of Witchcraft and Wizardry.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'title' => 'A Game of Thrones',
        'author_id' => 2,
        'genre_id' => 2,
        'price' => 180000,
        'stock' => 30,
        'description' => 'The first book in the A Song of Ice and Fire series, featuring political intrigue and dragons.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'title' => 'Foundation',
        'author_id' => 3,
        'genre_id' => 4,
        'price' => 120000,
        'stock' => 25,
        'description' => 'A mathematician develops a science to predict the future of large populations.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'title' => 'Murder on the Orient Express',
        'author_id' => 4,
        'genre_id' => 3,
        'price' => 95000,
        'stock' => 40,
        'description' => 'Detective Hercule Poirot investigates a murder on a snowbound train.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'title' => 'The Shining',
        'author_id' => 5,
        'genre_id' => 5,
        'price' => 110000,
        'stock' => 35,
        'description' => 'A family heads to an isolated hotel for the winter where a sinister presence influences the father.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
