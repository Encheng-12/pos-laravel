<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource with filtering, pagination, and global stats.
     */
    public function index(Request $request)
    {
        $method = $request->input('method', 'all');
        $search = $request->input('search');
        $sortBy = $request->input('sortby', 'id');
        $order = $request->input('order', 'desc');
        $perPage = $request->input('per_page', 10);

        // Build base query
        $query = Payment::with('order');

        // 1. Filter by Payment Method (handles "all", "cash", "aba", "acleda", "wing")
        if ($method && $method !== 'all') {
            $query->where('payment_method', strtolower($method));
        }

        // 2. Search Keyword
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('reference_no', 'LIKE', "%{$search}%")
                  ->orWhere('payment_method', 'LIKE', "%{$search}%")
                  ->orWhereHas('order', function ($orderQuery) use ($search) {
                      $orderQuery->where('invoice_no', 'LIKE', "%{$search}%");
                  });
            });
        }

        // 3. Compute overall summary metrics BEFORE pagination
        // (Clone query to ensure metrics reflect current search/method filters)
        $statsQuery = clone $query;
        $stats = [
            'total_count'    => $statsQuery->count(),
            'total_amount'   => (float) $statsQuery->sum('amount'),
            'cash_amount'    => (float) (clone $statsQuery)->where('payment_method', 'cash')->sum('amount'),
            'digital_amount' => (float) (clone $statsQuery)->whereIn('payment_method', ['aba', 'acleda', 'wing'])->sum('amount'),
        ];

        // 4. Apply Sorting & Pagination
        $payments = $query->orderBy($sortBy, $order)
                          ->paginate($perPage);

        // 5. Append summary statistics to JSON output
        return response()->json([
            'data'         => $payments->items(),
            'current_page' => $payments->currentPage(),
            'last_page'    => $payments->lastPage(),
            'per_page'     => $payments->perPage(),
            'total'        => $payments->total(),
            'stats'        => $stats,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id'       => 'required|exists:orders,id',
            'payment_method' => 'required|string',
            'amount'         => 'required|numeric|min:0',
            'reference_no'   => 'nullable|string',
            'paid_at'        => 'required|date',
        ]);

        $payment = Payment::create($validated);
        return response()->json($payment->load('order'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::with('order')->findOrFail($id);
        return response()->json($payment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'order_id'       => 'required|exists:orders,id',
            'payment_method' => 'required|string',
            'amount'         => 'required|numeric|min:0',
            'reference_no'   => 'nullable|string',
            'paid_at'        => 'required|date',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($validated);
        return response()->json($payment->load('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json(null, 204);
    }
}