<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('page-title','Ringkasan Operasional'); ?>
<?php $__env->startSection('content'); ?>
<form class="period-filter" method="GET">
    <?php $__currentLoopData = ['today'=>'Hari Ini','7d'=>'7 Hari','month'=>'Bulan Ini']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button name="period" value="<?php echo e($key); ?>" class="filter-chip <?php echo e($period===$key?'active':''); ?>"><?php echo e($label); ?></button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button type="button" class="filter-chip <?php echo e($period==='custom'?'active':''); ?>" data-bs-toggle="collapse" data-bs-target="#customDate">Custom</button>
    <div class="collapse <?php echo e($period==='custom'?'show':''); ?>" id="customDate"><div class="d-flex gap-2 mt-2 flex-wrap"><input type="date" name="from" value="<?php echo e($from->toDateString()); ?>" class="form-control form-control-sm w-auto"><input type="date" name="to" value="<?php echo e($to->toDateString()); ?>" class="form-control form-control-sm w-auto"><button name="period" value="custom" class="btn btn-sm btn-dark">Terapkan</button></div></div>
</form>

<div class="kpi-grid mt-4">
    <?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Total Tonase','value' => number_format($summary['total_ton'],3,',','.').' ton','icon' => 'bi-speedometer2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Total Tonase','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(number_format($summary['total_ton'],3,',','.').' ton'),'icon' => 'bi-speedometer2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Gross Revenue','value' => App\Support\Money::rupiah($summary['gross_revenue']),'icon' => 'bi-wallet2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Gross Revenue','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Support\Money::rupiah($summary['gross_revenue'])),'icon' => 'bi-wallet2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Biaya Transport','value' => App\Support\Money::rupiah($summary['transport_cost']),'icon' => 'bi-truck']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Biaya Transport','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Support\Money::rupiah($summary['transport_cost'])),'icon' => 'bi-truck']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Net After Transport','value' => App\Support\Money::rupiah($summary['net_after_transport']),'icon' => 'bi-graph-up-arrow','highlight' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Net After Transport','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Support\Money::rupiah($summary['net_after_transport'])),'icon' => 'bi-graph-up-arrow','highlight' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
</div>

<div class="secondary-kpi-grid mt-3">
    <div class="mini-kpi"><span>Trip</span><strong><?php echo e(number_format($summary['trip_count'])); ?></strong></div>
    <div class="mini-kpi"><span>Avg. Harga/Ton</span><strong><?php echo e(App\Support\Money::rupiah($summary['avg_price_per_ton'])); ?></strong></div>
    <div class="mini-kpi"><span>Sawit Buruk</span><strong><?php echo e(number_format($summary['bad_fruit_ton'],3,',','.')); ?> ton <small>(<?php echo e(number_format($summary['bad_fruit_rate'],2,',','.')); ?>%)</small></strong></div>
    <div class="mini-kpi"><span>Quality Loss</span><strong><?php echo e(App\Support\Money::rupiah($summary['quality_loss'])); ?></strong></div>
</div>

<div class="row g-3 mt-1">
    <div class="col-xl-8"><div class="panel h-100"><div class="panel-head"><div><p class="eyebrow">TREND</p><h3>Revenue & Tonase</h3></div></div><div class="chart-wrap"><canvas id="performanceChart"></canvas></div></div></div>
    <div class="col-xl-4"><div class="panel h-100"><div class="panel-head"><div><p class="eyebrow">QUALITY</p><h3>Kualitas Panen</h3></div></div><div class="quality-stat"><div class="quality-ring"><strong><?php echo e(number_format($summary['bad_fruit_rate'],1,',','.')); ?>%</strong><span>sawit buruk</span></div><p class="text-muted mb-0">Potensi pendapatan yang berkurang karena kualitas: <strong><?php echo e(App\Support\Money::rupiah($summary['quality_loss'])); ?></strong>.</p></div></div></div>
</div>

<div class="panel mt-3"><div class="panel-head"><div><p class="eyebrow">ACTIVITY</p><h3>Trip Terbaru</h3></div><a href="<?php echo e(route('trips.index')); ?>" class="link-soft">Lihat semua <i class="bi bi-arrow-right"></i></a></div>
<div class="desktop-table table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Trip</th><th>Tanggal</th><th>Tonase</th><th>Harga/Ton</th><th>Revenue</th><th>Net</th><th>Status</th></tr></thead><tbody><?php $__empty_1 = true; $__currentLoopData = $recentTrips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><a class="trip-link" href="<?php echo e(route('trips.show',$trip)); ?>"><?php echo e($trip->trip_number); ?></a></td><td><?php echo e($trip->transaction_date->format('d M Y')); ?></td><td><?php echo e(number_format($trip->factory_weight_ton,3,',','.')); ?> t</td><td><?php echo e(App\Support\Money::rupiah($trip->normal_price_per_ton)); ?></td><td><?php echo e(App\Support\Money::rupiah($trip->gross_revenue)); ?></td><td><strong><?php echo e(App\Support\Money::rupiah($trip->net_after_transport)); ?></strong></td><td><span class="status status-<?php echo e($trip->payment_status); ?>"><?php echo e(strtoupper($trip->payment_status)); ?></span></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="7" class="text-center text-muted py-5">Belum ada transaksi.</td></tr><?php endif; ?></tbody></table></div>
<div class="mobile-list"><?php $__currentLoopData = $recentTrips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a href="<?php echo e(route('trips.show',$trip)); ?>" class="mobile-trip-card"><div><strong><?php echo e($trip->trip_number); ?></strong><span><?php echo e($trip->transaction_date->format('d M Y')); ?></span></div><span class="status status-<?php echo e($trip->payment_status); ?>"><?php echo e(strtoupper($trip->payment_status)); ?></span><div class="mobile-trip-metrics"><span><small>Tonase</small><?php echo e(number_format($trip->factory_weight_ton,3,',','.')); ?> t</span><span><small>Net</small><?php echo e(App\Support\Money::rupiah($trip->net_after_transport)); ?></span></div></a><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
window.addEventListener('load', () => {
 const data = <?php echo json_encode($daily, 15, 512) ?>;
 const ctx = document.getElementById('performanceChart');
 if (!ctx) return;
 new Chart(ctx, {type:'bar', data:{labels:data.map(x=>x.date), datasets:[{type:'line',label:'Revenue',data:data.map(x=>x.revenue),yAxisID:'yRevenue',tension:.35,borderWidth:2,pointRadius:2},{type:'bar',label:'Tonase',data:data.map(x=>x.ton),yAxisID:'yTon',borderRadius:8}]}, options:{responsive:true,maintainAspectRatio:false,interaction:{mode:'index',intersect:false},plugins:{legend:{position:'bottom'}},scales:{yRevenue:{position:'left',ticks:{callback:v=>'Rp '+Intl.NumberFormat('id-ID',{notation:'compact'}).format(v)}},yTon:{position:'right',grid:{drawOnChartArea:false},ticks:{callback:v=>v+' t'}}}}});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sawit-database-system\resources\views/dashboard/index.blade.php ENDPATH**/ ?>