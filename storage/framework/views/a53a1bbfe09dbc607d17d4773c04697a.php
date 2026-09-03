<?php $__env->startSection('title','Laporan'); ?>
<?php $__env->startSection('page-title','Laporan Operasional'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel"><form method="GET" class="filter-bar"><div><label class="form-label">Dari</label><input type="date" name="from" value="<?php echo e($from); ?>" class="form-control"></div><div><label class="form-label">Sampai</label><input type="date" name="to" value="<?php echo e($to); ?>" class="form-control"></div><button class="btn btn-dark align-self-end">Tampilkan</button></form></div>
<div class="secondary-kpi-grid mt-3"><div class="mini-kpi"><span>Total Trip</span><strong><?php echo e($summary['trip_count']); ?></strong></div><div class="mini-kpi"><span>Total Tonase</span><strong><?php echo e(number_format($summary['total_ton'],3,',','.')); ?> ton</strong></div><div class="mini-kpi"><span>Average Price</span><strong><?php echo e(App\Support\Money::rupiah($summary['avg_price_per_ton'])); ?></strong></div><div class="mini-kpi"><span>Bad Fruit Rate</span><strong><?php echo e(number_format($summary['bad_fruit_rate'],2,',','.')); ?>%</strong></div></div>
<div class="kpi-grid mt-3"><?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
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
<?php endif; ?><?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Transport','value' => App\Support\Money::rupiah($summary['transport_cost']),'icon' => 'bi-truck']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Transport','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Support\Money::rupiah($summary['transport_cost'])),'icon' => 'bi-truck']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?><?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Quality Loss','value' => App\Support\Money::rupiah($summary['quality_loss']),'icon' => 'bi-exclamation-triangle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Quality Loss','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Support\Money::rupiah($summary['quality_loss'])),'icon' => 'bi-exclamation-triangle']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?><?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
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
<?php endif; ?></div>
<div class="panel mt-3"><div class="panel-head"><h3>Detail Periode</h3><span class="text-muted"><?php echo e(count($trips)); ?> transaksi paid</span></div><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Tanggal</th><th>Trip</th><th>Tonase</th><th>Bad Fruit</th><th>Gross</th><th>Transport</th><th>Net</th></tr></thead><tbody><?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr><td><?php echo e($t->transaction_date->format('d M Y')); ?></td><td><a class="trip-link" href="<?php echo e(route('trips.show',$t)); ?>"><?php echo e($t->trip_number); ?></a></td><td><?php echo e(number_format($t->factory_weight_ton,3,',','.')); ?></td><td><?php echo e(number_format($t->bad_fruit_ton??0,3,',','.')); ?></td><td><?php echo e(App\Support\Money::rupiah($t->gross_revenue)); ?></td><td><?php echo e(App\Support\Money::rupiah($t->transport_cost)); ?></td><td><strong><?php echo e(App\Support\Money::rupiah($t->net_after_transport)); ?></strong></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody></table></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sawit-database-system\resources\views/trips/report.blade.php ENDPATH**/ ?>