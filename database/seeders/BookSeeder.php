<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => "Harry Potter and the Sorcerer's Stone",
            'description' => "An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world.",
            'price' => 50000,
            'stock' => 50,
            'cover_photo' => 'harry_potter.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => "The Shining",
            'description' => "A family heads to an isolated hotel for the winter where an evil and sinister presence influences the father into violence.",
            'price' => 25000,
            'stock' => 30,
            'cover_photo' => 'the_shining.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => "Laskar Pelangi",
            'description' => "An inspiring story about the struggle of a group of students and their two teachers in a remote village in Indonesia.",
            'price' => 40000,
            'stock' => 40,
            'cover_photo' => 'laskar_pelangi.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);

        Book::create([
            'title' => "The Great Gatsby",
            'description' => "A mysterious millionaire’s obsession with a beautiful woman leads to tragedy in 1920s America.",
            'price' => 60000,
            'stock' => 25,
            'cover_photo' => 'the_great_gatsby.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ]);

        Book::create([
            'title' => "To Kill a Mockingbird",
            'description' => "A young girl's view of racial injustice and moral growth in the Deep South during the 1930s.",
            'price' => 55000,
            'stock' => 35,
            'cover_photo' => 'to_kill_a_mockingbird.jpg',
            'genre_id' => 5,
            'author_id' => 5,
        ]);
    }
}
