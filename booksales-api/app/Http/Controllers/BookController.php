<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

use function PEST\Laravel\json;

class BookController extends Controller
{
  public function index()
  {
    $books = Books::all();

    return response()->json([
      "success" => true,
      "message" => "Get All Resources",
      "data" => $books
    ], 200);
  }

  public function show($id)
  {
    $book = Books::with(['genre', 'author'])->find($id);

    //Validasi jika data tidak ditemukan
    if (!$book) {
      return response()->json([
        'success' => false,
        'message' => 'Data buku tidak ditemukan',
      ], 404);
    }

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data buku berhasil diambil',
      'data' => $book,
    ], 200);
  }

  public function store(Request $request)
  {
    //Validasi
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'nullable|string',
      'price' => 'required|numeric|min:0',
      'stock' => 'required|integer|min:0',
      'cover_photo' => 'nullable|string|max:255',
      'genre_id' => 'required|exists:genres,id',
      'author_id' => 'required|exists:authors,id',
    ]);

    //Simpan
    $book = Books::create([
      'title' => $request->title,
      'description' => $request->description,
      'price' => $request->price,
      'stock' => $request->stock,
      'cover_photo' => $request->cover_photo,
      'genre_id' => $request->genre_id,
      'author_id' => $request->author_id,
    ]);

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data buku berhasil ditambahkan',
      'data' => $book,
    ], 201);
  }

  public function update(Request $request, $id)
  {
    $book = Books::find($id);

    //Validasi jika data tidak ditemukan
    if (!$book) {
      return response()->json([
        'success' => false,
        'message' => 'Data buku tidak ditemukan',
      ], 404);
    }

    //Validasi
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'nullable|string',
      'price' => 'required|numeric|min:0',
      'stock' => 'required|integer|min:0',
      'cover_photo' => 'nullable|string|max:255',
      'genre_id' => 'required|exists:genres,id',
      'author_id' => 'required|exists:authors,id',
    ]);

    //Update
    $book->update([
      'title' => $request->title,
      'description' => $request->description,
      'price' => $request->price,
      'stock' => $request->stock,
      'cover_photo' => $request->cover_photo,
      'genre_id' => $request->genre_id,
      'author_id' => $request->author_id,
    ]);

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data buku berhasil diperbarui',
      'data' => $book,
    ], 200);
  }

  public function destroy($id)
  {
    $book = Books::find($id);

    //Validasi jika data tidak ditemukan
    if (!$book) {
      return response()->json([
        'success' => false,
        'message' => 'Data buku tidak ditemukan',
      ], 404);
    }

    //Hapus
    $book->delete();

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data buku berhasil dihapus',
      'data' => $book
    ], 200);
  }
}
