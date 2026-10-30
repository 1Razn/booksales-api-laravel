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
      'success' => true,
      'message' => 'Get All Resources',
      'data' => $genres
    ], 200);
  }

  public function show($id)
  {
    $genre = Genre::find($id);

    //Validasi jika data tidak ditemukan
    if (!$genre) {
      return response()->json([
        'success' => false,
        'message' => 'Data genre tidak ditemukan',
      ], 404);
    }

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data genre berhasil diambil',
      'data' => $genre,
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
    $genre = Genre::create([
      'name' => $request->name,
      'description' => $request->description
    ]);

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data Berhasil Disimpan',
      'data' => $genre
    ], 201);
  }

  public function update(Request $request, $id)
  {
    $genre = Genre::find($id);

    //Validasi jika data tidak ditemukan
    if (!$genre) {
      return response()->json([
        'success' => false,
        'message' => 'Data genre tidak ditemukan',
      ], 404);
    }

    //Validasi
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string',
    ]);

    //Update
    $genre->update([
      'name' => $request->name,
      'description' => $request->description,
    ]);

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data genre berhasil diperbarui',
      'data' => $genre,
    ], 200);
  }

  public function destroy($id)
  {
    $genre = Genre::find($id);

    //Validasi jika data tidak ditemukan
    if (!$genre) {
      return response()->json([
        'success' => false,
        'message' => 'Data genre tidak ditemukan',
      ], 404);
    }

    //Hapus
    $genre->delete();

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data genre berhasil dihapus',
      'data' => $genre
    ], 200);
  }
}
