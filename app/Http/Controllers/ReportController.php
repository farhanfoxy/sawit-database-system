<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to = $request->input('to', now()->toDateString());
        $trips = Trip::whereBetween('transaction_date', [$from, $to])->where('payment_status', 'paid')->orderBy('transaction_date')->get();

        $summary = [
            'trip_count' => $trips->count(),
            'total_ton' => $trips->sum(fn ($t) => (float) $t->factory_weight_ton),
            'bad_fruit_ton' => $trips->sum(fn ($t) => (float) ($t->bad_fruit_ton ?? 0)),
            'gross_revenue' => $trips->sum(fn ($t) => $t->gross_revenue),
            'transport_cost' => $trips->sum(fn ($t) => (float) $t->transport_cost),
            'net_after_transport' => $trips->sum(fn ($t) => $t->net_after_transport),
            'quality_loss' => $trips->sum(fn ($t) => $t->quality_loss),
        ];
        $summary['avg_price_per_ton'] = $summary['total_ton'] ? $summary['gross_revenue'] / $summary['total_ton'] : 0;
        $summary['bad_fruit_rate'] = $summary['total_ton'] ? ($summary['bad_fruit_ton'] / $summary['total_ton']) * 100 : 0;

        return view('trips.report', compact('trips', 'summary', 'from', 'to'));
    }
}
