<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $transactionCount = Transaction::count();

        $totalStock = Product::sum('stock');

        $bestSellingProduct = TransactionDetail::select('product_id')
            ->selectRaw('SUM(qty) as total_qty')
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->first();

        $bestProductName = $bestSellingProduct
            ? Product::find($bestSellingProduct->product_id)->name
            : 'Belum ada data';

        $totalIncome = Transaction::whereMonth('date', now()->month)
            ->sum('total');

            $weeklyIncome = Transaction::selectRaw('WEEK(date) as week, SUM(total) as total')
            ->whereMonth('date', now()->month)
            ->groupBy('week')
            ->orderBy('week')
            ->pluck('total', 'week');

        $incomeData = [];
        for ($i = 1; $i <= 4; $i++) {
            $incomeData[] = $weeklyIncome->get($i, 0);
        }

        return view('dashboard', [
            'transactionCount' => $transactionCount,
            'totalStock' => $totalStock,
            'bestProductName' => $bestProductName,
            'totalIncome' => $totalIncome,
            'incomeData' => $incomeData,
        ]);
    }

    public function storeDashboard(string $id)
    {
        $store = Store::findOrFail($id);
        $weeklyIncome = Transaction::selectRaw('WEEK(date) as week, SUM(total) as total')
            ->where('store_id', $store->id)
            ->whereMonth('date', now()->month)
            ->groupBy('week')
            ->orderBy('week')
            ->pluck('total', 'week');

        $incomeData = [];
        for ($i = 1; $i <= 4; $i++) {
            $incomeData[] = $weeklyIncome->get($i, 0);
        }

        $transactionCount = Transaction::where('store_id', $store->id)->count();

        $totalStock = Product::where('store_id', $store->id)->sum('stock');

        $bestSellingProduct = TransactionDetail::select('product_id')
            ->selectRaw('SUM(qty) as total_qty')
            ->whereHas('transaction', function($query) use ($store) {
                $query->where('store_id', $store->id);
            })
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->first();

        $bestProductName = $bestSellingProduct
            ? Product::find($bestSellingProduct->product_id)->name
            : 'Belum ada data';

        $totalIncome = Transaction::where('store_id', $store->id)
            ->whereMonth('date', now()->month)
            ->sum('total');

        return view('dashboard', [
            'transactionCount' => $transactionCount,
            'totalStock' => $totalStock,
            'bestProductName' => $bestProductName,
            'totalIncome' => $totalIncome,
            'incomeData' => $incomeData,
            'store' => $store,
        ]);
    }
}
