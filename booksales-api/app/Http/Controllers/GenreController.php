<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

use function PEST\Laravel\json;

class GenreController extends Controller
{
  public function index()
  {
    $genres = Genre::all();

    return response()->json([
      "success" => true,
      "message" => "Get All Resources",
      "data" => $genres
    ], 200);
  }

  public function store(Request $request)
  {
    //Validasi
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string',
    ]);

    //Simpan
    Genre::create([
      'name' => $request->name,
      'description' => $request->description
    ]);

    //Response
    return response()->json([
      "success" => true,
      "message" => "Data Berhasil Disimpan",
    ], 201);
  }
}
