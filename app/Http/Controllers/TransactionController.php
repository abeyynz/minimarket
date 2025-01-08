<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->get('search_product', '');
        $products = Product::paginate(9);
        $products = Product::where('stock', '>', 0)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('code', 'like', "%$search%");
            })
            ->paginate(9);

        return view('transactions.index', compact('products', 'search'));
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'qty' => 'required|array',
            'qty.*' => 'integer|min:1',
        ]);

        $products = Product::whereIn('id', $validated['product_ids'])->get();

        $total = 0;
        foreach ($products as $product) {
            $subtotal = $product->price * $validated['qty'][$product->id];
            $total += $subtotal;
        }

        $transaction = Transaction::create([
            'code' => 'TRX-' . strtoupper(Str::random(6)),
            'date' => now(),
            'total' => $total,
            'user_id' => auth()->id(),
        ]);

        foreach ($products as $product) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'qty' => $validated['qty'][$product->id],
                'price' => $product->price,
                'total' => $product->price * $validated['qty'][$product->id],
            ]);

            $product->decrement('stock', $validated['qty'][$product->id]);
        }

        return redirect()->route('transaction')->with('success', 'Transaksi berhasil disimpan!');
    }
}
