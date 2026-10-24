<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'J.K. Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'British author, best known for the Harry Potter series.',
        ],
        [
            'id' => 2,
            'name' => 'George R.R. Martin',
            'photo' => 'george_rr_martin.jpg',
            'bio' => 'American author, best known for the A Song of Ice and Fire series.',
        ],
        [
            'id' => 3,
            'name' => 'Isaac Asimov',
            'photo' => 'isaac_asimov.jpg',
            'bio' => 'American author, best known for the Foundation series and science fiction works.',
        ],
        [
            'id' => 4,
            'name' => 'Agatha Christie',
            'photo' => 'agatha_christie.jpg',
            'bio' => 'British author, best known for her detective novels featuring Hercule Poirot and Miss Marple.',
        ],
        [
            'id' => 5,
            'name' => 'Stephen King',
            'photo' => 'stephen_king.jpg',
            'bio' => 'American author, best known for his horror and supernatural fiction novels.',
        ],
    ];

    public function getAuthor()
    {
        return $this->authors;
    }
}
