<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

use function PEST\Laravel\json;

class AuthorController extends Controller
{
  public function index()
  {
    $authors = Author::all();

    return response()->json([
      "success" => true,
      "message" => "Get All Resources",
      "data" => $authors
    ], 200);
  }

  public function store(Request $request)
  {
    //Validasi
    $request->validate([
      'name' => 'required|string|max:255',
      'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'bio' => 'required|string',
    ]);

    //Handle upload foto
    $photoPath = null;
    if ($request->hasFile('photo')) {
      //Simpan file ke storage/app/public/photos
      $photoPath = $request->file('photo')->store('photos', 'public');
    }

    //Simpan
    $authors = Author::create([
      'name' => $request->name,
      'photo' => $photoPath,
      'bio' => $request->bio
    ]);

    //Response
    return response()->json([
      "success" => true,
      "message" => "Data Berhasil Disimpan",
      "data" => $authors
    ], 201);
  }
}
