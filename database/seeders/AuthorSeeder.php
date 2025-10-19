<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Tere Liye',
            'photo' => 'tere_liye.jpg',
            'bio' => 'Penulis novel populer Indonesia.'
        ]);

        Author::create([
            'name' => 'Andrea Hirata',
            'photo' => 'andrea_hirata.jpg',
            'bio' => 'Penulis Laskar Pelangi.'
        ]);

        Author::create([
            'name' => 'Dewi Lestari',
            'photo' => 'dewi_lestari.jpg',
            'bio' => 'Penulis dan musisi Indonesia.'
        ]);

        Author::create([
            'name' => 'Habiburrahman El Shirazy',
            'photo' => 'habiburrahman_el_shirazy.jpg',
            'bio' => 'Penulis Ayat-Ayat Cinta.'
        ]);

        Author::create([
            'name' => 'Ahmad Fuadi',
            'photo' => 'ahmad_fuadi.jpg',
            'bio' => 'Penulis Negeri 5 Menara.'
        ]);
    }
}
