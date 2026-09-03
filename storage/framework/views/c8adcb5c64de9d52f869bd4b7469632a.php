<?php $__env->startSection('title',$trip->trip_number); ?>
<?php $__env->startSection('page-title',$trip->trip_number); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex flex-wrap justify-content-between gap-2 mb-3"><div><span class="status status-<?php echo e($trip->payment_status); ?>"><?php echo e(strtoupper($trip->payment_status)); ?></span><span class="text-muted ms-2"><?php echo e($trip->transaction_date->format('d F Y')); ?> · Input oleh <?php echo e($trip->creator->name); ?></span></div><?php if(!auth()->user()->isOwner()): ?><a href="<?php echo e(route('trips.edit',$trip)); ?>" class="btn btn-outline-dark"><i class="bi bi-pencil"></i> Koreksi Data</a><?php endif; ?></div>
<div class="kpi-grid"><?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Tonase Pabrik','value' => number_format($trip->factory_weight_ton,3,',','.').' ton','icon' => 'bi-speedometer2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Tonase Pabrik','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(number_format($trip->factory_weight_ton,3,',','.').' ton'),'icon' => 'bi-speedometer2']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Gross Revenue','value' => App\Support\Money::rupiah($trip->gross_revenue),'icon' => 'bi-wallet2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Gross Revenue','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Support\Money::rupiah($trip->gross_revenue)),'icon' => 'bi-wallet2']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Transport','value' => App\Support\Money::rupiah($trip->transport_cost),'icon' => 'bi-truck']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Transport','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Support\Money::rupiah($trip->transport_cost)),'icon' => 'bi-truck']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['label' => 'Net After Transport','value' => App\Support\Money::rupiah($trip->net_after_transport),'icon' => 'bi-graph-up-arrow','highlight' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Net After Transport','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Support\Money::rupiah($trip->net_after_transport)),'icon' => 'bi-graph-up-arrow','highlight' => 'true']); ?>
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
<div class="row g-3 mt-1"><div class="col-lg-7"><div class="panel"><div class="panel-head"><h3>Detail Perhitungan</h3></div><div class="detail-list"><div><span>Harga Normal / Ton</span><strong><?php echo e(App\Support\Money::rupiah($trip->normal_price_per_ton)); ?></strong></div><div><span>Tonase Normal</span><strong><?php echo e(number_format($trip->normal_ton,3,',','.')); ?> ton</strong></div><div><span>Sawit Buruk</span><strong><?php echo e(number_format($trip->bad_fruit_ton ?? 0,3,',','.')); ?> ton</strong></div><?php if($trip->bad_fruit_ton): ?><div><span>Harga Sawit Buruk / Ton</span><strong><?php echo e(App\Support\Money::rupiah($trip->bad_fruit_price_per_ton)); ?></strong></div><div><span>Quality Loss</span><strong><?php echo e(App\Support\Money::rupiah($trip->quality_loss)); ?></strong></div><?php endif; ?><div><span>No. Tiket Timbang</span><strong><?php echo e($trip->weigh_ticket_number ?: '—'); ?></strong></div></div></div></div><div class="col-lg-5"><div class="panel"><div class="panel-head"><h3>Dokumen</h3></div><?php $__empty_1 = true; $__currentLoopData = $trip->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><a href="<?php echo e(route('trips.attachments.download',[$trip,$a])); ?>" class="doc-row"><i class="bi <?php echo e($a->type==='weigh_ticket'?'bi-receipt':'bi-credit-card'); ?>"></i><div><strong><?php echo e($a->type==='weigh_ticket'?'Bukti Timbang':'Bukti Pembayaran'); ?></strong><span><?php echo e($a->original_name); ?></span></div><i class="bi bi-download ms-auto"></i></a><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><p class="text-muted mb-0">Belum ada dokumen.</p><?php endif; ?></div></div></div>
<?php if($trip->notes): ?><div class="panel mt-3"><p class="eyebrow">NOTES</p><p class="mb-0"><?php echo e($trip->notes); ?></p></div><?php endif; ?>
<?php if(!auth()->user()->isOwner() && $trip->payment_status!=='cancelled'): ?><div class="panel danger-panel mt-3"><div><strong>Batalkan transaksi</strong><p class="mb-0 text-muted">Data tidak akan dihapus dan tetap tercatat di audit log.</p></div><form method="POST" action="<?php echo e(route('trips.cancel',$trip)); ?>" class="d-flex gap-2 flex-wrap"><?php echo csrf_field(); ?><input name="reason" class="form-control" required minlength="5" placeholder="Alasan pembatalan"><button class="btn btn-outline-danger">Batalkan</button></form></div><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sawit-database-system\resources\views/trips/show.blade.php ENDPATH**/ ?>