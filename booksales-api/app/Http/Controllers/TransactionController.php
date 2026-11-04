<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Books;

class TransactionController extends Controller
{
  public function index()
  {
    $transactions = Transaction::with(['customer', 'book'])->get();

    return response()->json([
      'success' => true,
      'message' => 'Data transaksi berhasil diambil',
      'data' => $transactions,
    ], 200);
  }

  public function myTransactions()
  {
    $userId = auth('api')->id();
    $transactions = Transaction::where('customer_id', $userId)
      ->with('book')
      ->get();

    return response()->json([
      'success' => true,
      'message' => 'Daftar transaksi Anda',
      'data' => $transactions,
    ], 200);
  }

  public function show($id)
  {
    //Ambil user yang login
    $userId = auth('api')->id();

    //Cari transaksi berdasarkan ID DAN customer_id = user yang login
    $transaction = Transaction::with(['customer', 'book'])
      ->where('id', $id)
      ->where('customer_id', $userId)
      ->first();

    //Validasi jika transaksi tidak ditemukan
    if (!$transaction) {
      return response()->json([
        'success' => false,
        'message' => 'Data transaksi tidak ditemukan atau bukan milik Anda',
      ], 404);
    }

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data transaksi berhasil diambil',
      'data' => $transaction,
    ], 200);
  }

  public function store(Request $request)
  {
    //Validasi
    $request->validate([
      'book_id' => 'required|exists:books,id',
      'total_amount' => 'required|numeric|min:0',
    ]);

    $orderNumber = 'ORD-' . strtoupper(Str::random(10));

    //Buat transaksi
    $transaction = Transaction::create([
      'order_number' => $orderNumber,
      'customer_id' => auth('api')->id(),
      'book_id' => $request->book_id,
      'total_amount' => $request->total_amount,
    ]);

    //Kurangi stok buku
    $book = Books::find($request->book_id);
    if ($book->stock > 0) {
      $book->decrement('stock');
    }

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Transaksi berhasil dibuat',
      'data' => $transaction,
    ], 201);
  }

  public function update(Request $request, $id)
  {
    $userId = auth('api')->id();

    //Pastikan transaksi milik customer yang login
    $transaction = Transaction::where('id', $id)
      ->where('customer_id', $userId)
      ->first();

    //Validasi jika transaksi tidak ditemukan
    if (!$transaction) {
      return response()->json([
        'success' => false,
        'message' => 'Data transaksi tidak ditemukan atau bukan milik Anda',
      ], 404);
    }

    //Validasi
    $request->validate([
      'book_id' => 'required|exists:books,id',
      'total_amount' => 'required|numeric|min:0',
    ]);

    //Update
    $transaction->update([
      'book_id' => $request->book_id,
      'total_amount' => $request->total_amount,
    ]);

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data transaksi berhasil diperbarui',
      'data' => $transaction,
    ], 200);
  }

  public function destroy($id)
  {
    $transaction = Transaction::find($id);

    //Validasi jika transaksi tidak ditemukan
    if (!$transaction) {
      return response()->json([
        'success' => false,
        'message' => 'Data transaksi tidak ditemukan',
      ], 404);
    }

    //Hapus
    $transaction->delete();

    //Response
    return response()->json([
      'success' => true,
      'message' => 'Data transaksi berhasil dihapus',
      'data' => $transaction,
    ], 200);
  }
}
