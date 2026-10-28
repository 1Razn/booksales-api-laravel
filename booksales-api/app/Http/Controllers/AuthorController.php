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
}
