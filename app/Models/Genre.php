<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public static function getAllGenres()
    {
        return [
            ['id' => 1, 'name' => 'Action'],
            ['id' => 2, 'name' => 'Comedy'],
            ['id' => 3, 'name' => 'Drama'],
            ['id' => 4, 'name' => 'Romance'],
            ['id' => 5, 'name' => 'Horror'],
        ];
    }
}
