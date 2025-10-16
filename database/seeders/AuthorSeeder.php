<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'Tere Liye', 'email' => 'tere@example.com', 'bio' => 'Penulis novel populer Indonesia.'],
            ['name' => 'Andrea Hirata', 'email' => 'andrea@example.com', 'bio' => 'Penulis Laskar Pelangi.'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@example.com', 'bio' => 'Penulis dan musisi Indonesia.'],
            ['name' => 'Habiburrahman El Shirazy', 'email' => 'habib@example.com', 'bio' => 'Penulis Ayat-Ayat Cinta.'],
            ['name' => 'Ahmad Fuadi', 'email' => 'fuadi@example.com', 'bio' => 'Penulis Negeri 5 Menara.'],
        ]);
    }
}
