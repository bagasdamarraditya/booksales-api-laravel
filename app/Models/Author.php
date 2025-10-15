<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static function getAllAuthors()
    {
        return [
            ['id' => 1, 'name' => 'J.K. Rowling'],
            ['id' => 2, 'name' => 'George R.R. Martin'],
            ['id' => 3, 'name' => 'Haruki Murakami'],
            ['id' => 4, 'name' => 'Stephen King'],
            ['id' => 5, 'name' => 'Tere Liye'],
        ];
    }
}
