@extends('layouts.app')
@section('title','Dashboard')
@section('page-title','Ringkasan Operasional')
@section('content')
<form class="period-filter" method="GET">
    @foreach(['today'=>'Hari Ini','7d'=>'7 Hari','month'=>'Bulan Ini'] as $key=>$label)
        <button name="period" value="{{ $key }}" class="filter-chip {{ $period===$key?'active':'' }}">{{ $label }}</button>
    @endforeach
    <button type="button" class="filter-chip {{ $period==='custom'?'active':'' }}" data-bs-toggle="collapse" data-bs-target="#customDate">Custom</button>
    <div class="collapse {{ $period==='custom'?'show':'' }}" id="customDate"><div class="d-flex gap-2 mt-2 flex-wrap"><input type="date" name="from" value="{{ $from->toDateString() }}" class="form-control form-control-sm w-auto"><input type="date" name="to" value="{{ $to->toDateString() }}" class="form-control form-control-sm w-auto"><button name="period" value="custom" class="btn btn-sm btn-dark">Terapkan</button></div></div>
</form>

<div class="kpi-grid mt-4">
    <x-kpi-card label="Total Tonase" :value="number_format($summary['total_ton'],3,',','.').' ton'" icon="bi-speedometer2" />
    <x-kpi-card label="Gross Revenue" :value="App\Support\Money::rupiah($summary['gross_revenue'])" icon="bi-wallet2" />
    <x-kpi-card label="Biaya Transport" :value="App\Support\Money::rupiah($summary['transport_cost'])" icon="bi-truck" />
    <x-kpi-card label="Net After Transport" :value="App\Support\Money::rupiah($summary['net_after_transport'])" icon="bi-graph-up-arrow" highlight="true" />
</div>

<div class="secondary-kpi-grid mt-3">
    <div class="mini-kpi"><span>Trip</span><strong>{{ number_format($summary['trip_count']) }}</strong></div>
    <div class="mini-kpi"><span>Avg. Harga/Ton</span><strong>{{ App\Support\Money::rupiah($summary['avg_price_per_ton']) }}</strong></div>
    <div class="mini-kpi"><span>Sawit Buruk</span><strong>{{ number_format($summary['bad_fruit_ton'],3,',','.') }} ton <small>({{ number_format($summary['bad_fruit_rate'],2,',','.') }}%)</small></strong></div>
    <div class="mini-kpi"><span>Quality Loss</span><strong>{{ App\Support\Money::rupiah($summary['quality_loss']) }}</strong></div>
</div>

<div class="row g-3 mt-1">
    <div class="col-xl-8"><div class="panel h-100"><div class="panel-head"><div><p class="eyebrow">TREND</p><h3>Revenue & Tonase</h3></div></div><div class="chart-wrap"><canvas id="performanceChart"></canvas></div></div></div>
    <div class="col-xl-4"><div class="panel h-100"><div class="panel-head"><div><p class="eyebrow">QUALITY</p><h3>Kualitas Panen</h3></div></div><div class="quality-stat"><div class="quality-ring"><strong>{{ number_format($summary['bad_fruit_rate'],1,',','.') }}%</strong><span>sawit buruk</span></div><p class="text-muted mb-0">Potensi pendapatan yang berkurang karena kualitas: <strong>{{ App\Support\Money::rupiah($summary['quality_loss']) }}</strong>.</p></div></div></div>
</div>

<div class="panel mt-3"><div class="panel-head"><div><p class="eyebrow">ACTIVITY</p><h3>Trip Terbaru</h3></div><a href="{{ route('trips.index') }}" class="link-soft">Lihat semua <i class="bi bi-arrow-right"></i></a></div>
<div class="desktop-table table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Trip</th><th>Tanggal</th><th>Tonase</th><th>Harga/Ton</th><th>Revenue</th><th>Net</th><th>Status</th></tr></thead><tbody>@forelse($recentTrips as $trip)<tr><td><a class="trip-link" href="{{ route('trips.show',$trip) }}">{{ $trip->trip_number }}</a></td><td>{{ $trip->transaction_date->format('d M Y') }}</td><td>{{ number_format($trip->factory_weight_ton,3,',','.') }} t</td><td>{{ App\Support\Money::rupiah($trip->normal_price_per_ton) }}</td><td>{{ App\Support\Money::rupiah($trip->gross_revenue) }}</td><td><strong>{{ App\Support\Money::rupiah($trip->net_after_transport) }}</strong></td><td><span class="status status-{{ $trip->payment_status }}">{{ strtoupper($trip->payment_status) }}</span></td></tr>@empty<tr><td colspan="7" class="text-center text-muted py-5">Belum ada transaksi.</td></tr>@endforelse</tbody></table></div>
<div class="mobile-list">@foreach($recentTrips as $trip)<a href="{{ route('trips.show',$trip) }}" class="mobile-trip-card"><div><strong>{{ $trip->trip_number }}</strong><span>{{ $trip->transaction_date->format('d M Y') }}</span></div><span class="status status-{{ $trip->payment_status }}">{{ strtoupper($trip->payment_status) }}</span><div class="mobile-trip-metrics"><span><small>Tonase</small>{{ number_format($trip->factory_weight_ton,3,',','.') }} t</span><span><small>Net</small>{{ App\Support\Money::rupiah($trip->net_after_transport) }}</span></div></a>@endforeach</div>
</div>
@endsection
@push('scripts')
<script>
window.addEventListener('load', () => {
 const data = @json($daily);
 const ctx = document.getElementById('performanceChart');
 if (!ctx) return;
 new Chart(ctx, {type:'bar', data:{labels:data.map(x=>x.date), datasets:[{type:'line',label:'Revenue',data:data.map(x=>x.revenue),yAxisID:'yRevenue',tension:.35,borderWidth:2,pointRadius:2},{type:'bar',label:'Tonase',data:data.map(x=>x.ton),yAxisID:'yTon',borderRadius:8}]}, options:{responsive:true,maintainAspectRatio:false,interaction:{mode:'index',intersect:false},plugins:{legend:{position:'bottom'}},scales:{yRevenue:{position:'left',ticks:{callback:v=>'Rp '+Intl.NumberFormat('id-ID',{notation:'compact'}).format(v)}},yTon:{position:'right',grid:{drawOnChartArea:false},ticks:{callback:v=>v+' t'}}}}});
});
</script>
@endpush
