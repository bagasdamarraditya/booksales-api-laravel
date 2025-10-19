<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::create(['name' => 'Fantasy', 'description' => 'Imaginative fiction involving magic and adventure.']);
        Genre::create(['name' => 'Horror', 'description' => 'Stories designed to evoke fear and suspense.']);
        Genre::create(['name' => 'Drama', 'description' => 'Serious narratives focusing on character development.']);
        Genre::create(['name' => 'Romance', 'description' => 'Stories about love and emotional relationships.']);
        Genre::create(['name' => 'Comedy', 'description' => 'Humorous stories designed to entertain.']);
    }
}
