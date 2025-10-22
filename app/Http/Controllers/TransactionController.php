<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class TransactionController extends Controller
{
    // ADMIN: Lihat semua transaksi
    public function index()
    {
        $transactions = Transaction::with(['customer', 'book'])->get();

        return response()->json([
            'success' => true,
            'message' => 'List all transactions',
            'data' => $transactions
        ], 200);
    }

    // CUSTOMER: Melihat detail transaksi sendiri
    public function show($id)
    {
        $transaction = Transaction::with(['customer', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $transaction
        ], 200);
    }

    // CUSTOMER: Membuat transaksi
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'total_amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $transaction = Transaction::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $request->total_amount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully',
            'data' => $transaction
        ], 201);
    }

    // CUSTOMER: Update transaksi
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['success' => false, 'message' => 'Transaction not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'book_id' => 'exists:books,id',
            'total_amount' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $transaction->update($request->only(['book_id', 'total_amount']));

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully',
            'data' => $transaction
        ], 200);
    }

    // ADMIN: Hapus transaksi
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully'
        ], 200);
    }
}
