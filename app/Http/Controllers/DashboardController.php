<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        [$from, $to, $period] = $this->resolvePeriod($request);

        $trips = Trip::query()
            ->with('creator')
            ->where('payment_status', 'paid')
            ->whereBetween('transaction_date', [$from->toDateString(), $to->toDateString()])
            ->orderBy('transaction_date')
            ->get();

        $summary = [
            'total_ton' => $trips->sum(fn ($trip) => (float) $trip->factory_weight_ton),
            'gross_revenue' => $trips->sum(fn ($trip) => $trip->gross_revenue),
            'transport_cost' => $trips->sum(fn ($trip) => (float) $trip->transport_cost),
            'net_after_transport' => $trips->sum(fn ($trip) => $trip->net_after_transport),
            'trip_count' => $trips->count(),
            'bad_fruit_ton' => $trips->sum(fn ($trip) => (float) ($trip->bad_fruit_ton ?? 0)),
            'quality_loss' => $trips->sum(fn ($trip) => $trip->quality_loss),
        ];
        $summary['avg_price_per_ton'] = $summary['total_ton'] > 0
            ? $summary['gross_revenue'] / $summary['total_ton']
            : 0;
        $summary['bad_fruit_rate'] = $summary['total_ton'] > 0
            ? ($summary['bad_fruit_ton'] / $summary['total_ton']) * 100
            : 0;

        $daily = $trips->groupBy(fn ($trip) => $trip->transaction_date->format('Y-m-d'))->map(fn ($items, $date) => [
            'date' => Carbon::parse($date)->format('d M'),
            'ton' => round($items->sum(fn ($trip) => (float) $trip->factory_weight_ton), 3),
            'revenue' => $items->sum(fn ($trip) => $trip->gross_revenue),
            'net' => $items->sum(fn ($trip) => $trip->net_after_transport),
        ])->values();

        $recentTrips = Trip::with('creator')->latest('transaction_date')->latest()->limit(8)->get();

        return view('dashboard.index', compact('summary', 'daily', 'recentTrips', 'period', 'from', 'to'));
    }

    private function resolvePeriod(Request $request): array
    {
        $period = $request->string('period', 'today')->toString();
        return match ($period) {
            '7d' => [now()->subDays(6)->startOfDay(), now()->endOfDay(), $period],
            'month' => [now()->startOfMonth(), now()->endOfDay(), $period],
            'custom' => [Carbon::parse($request->input('from', now()->toDateString()))->startOfDay(), Carbon::parse($request->input('to', now()->toDateString()))->endOfDay(), $period],
            default => [now()->startOfDay(), now()->endOfDay(), 'today'],
        };
    }
}
