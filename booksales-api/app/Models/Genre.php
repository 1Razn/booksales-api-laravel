<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Fiction',
            'description' => 'Imaginative stories created from the authors creativity rather than real events',
        ],
        [
            'id' => 2,
            'name' => 'Fantasy',
            'description' => 'Stories featuring magical elements, mythical creatures, and supernatural worlds',
        ],
        [
            'id' => 3,
            'name' => 'Mystery',
            'description' => 'Narratives centered around solving a crime, uncovering secrets, or finding the truth behind a puzzling event',
        ],
        [
            'id' => 4,
            'name' => 'Horror',
            'description' => 'Stories designed to frighten, scare, or disgust readers with supernatural or terrifying elements',
        ],
        [
            'id' => 5,
            'name' => 'Romance',
            'description' => 'Stories focused on romantic relationships and emotional connections between characters',
        ],
    ];

    public function getGenres() {
        return $this->genres;
    }
}
