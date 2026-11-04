<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('transactions')->insert([
      [
        'order_number' => 'ORD-0001',
        'customer_id' => 2,
        'book_id' => 1,
        'total_amount' => 150000,
      ],
      [
        'order_number' => 'ORD-0002',
        'customer_id' => 2,
        'book_id' => 2,
        'total_amount' => 180000,
      ]
    ]);
  }
}
