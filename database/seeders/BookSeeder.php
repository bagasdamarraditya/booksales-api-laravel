<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => 'Laskar Pelangi', 'isbn' => '9786020324780', 'price' => 85000, 'author_id' => 2],
            ['title' => 'Hafalan Shalat Delisa', 'isbn' => '9789793062790', 'price' => 70000, 'author_id' => 4],
            ['title' => 'Rindu', 'isbn' => '9786020328306', 'price' => 95000, 'author_id' => 1],
            ['title' => 'Supernova', 'isbn' => '9786020333546', 'price' => 120000, 'author_id' => 3],
            ['title' => 'Negeri 5 Menara', 'isbn' => '9786028811299', 'price' => 80000, 'author_id' => 5],
        ]);
    }
}
