<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  protected $fillable = [
    'name',
    'description',
  ];

  //Relasi ke Books
  public function books()
  {
    return $this->hasMany(Books::class);
  }
}
