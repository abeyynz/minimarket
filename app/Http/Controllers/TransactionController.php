<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $storeName = Auth::user()->store->name;
        $search = $request->get('search_product', '');
        $products = Product::where('store_id', Auth::user()->store_id)
            ->where('stock', '>', 0)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('code', 'like', "%$search%");
            })
            ->paginate(9);

        return view('transactions.index', compact('products', 'search', 'storeName'));
    }
    public function history(Request $request)
    {
        $storeName = Auth::user()->store->name;
        $query = Transaction::where('store_id', Auth::user()->store_id);

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $data['transactions'] = $query->get();

        return view('transactions.history', $data, compact('storeName'));
    }

    public function detail(String $id)
    {
        $transaction = Transaction::where('id', $id)
            ->where('store_id', Auth::user()->store_id)
            ->with('user')
            ->firstOrFail();
        $transaction_details = TransactionDetail::with('product')
            ->where('transaction_id', $id)
            ->get();

        return view('transactions.detail',  compact('transaction', 'transaction_details'));

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
            'store_id' => Auth::user()->store_id,
            'user_id' => Auth::user()->id
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
    public function print(Request $request)
    {
        $query = Transaction::where('store_id', Auth::user()->store_id);

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $data['transactions'] = $query->get();
        $pdf = Pdf::loadView('transactions.print', $data);

        return $pdf->stream('RiwayatTransaksi.pdf');
    }


    public function printDetail($id)
    {
        $transaction = Transaction::with('user')->findOrFail($id);
        $transaction_details = TransactionDetail::with('product')
            ->where('transaction_id', $id)
            ->get();

        $pdf = Pdf::loadView('transactions.print-detail', compact('transaction', 'transaction_details'));

        return $pdf->stream('detail-transaksi-' . $transaction->code . '.pdf');
    }

}
