<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Sawit Database'); ?> · <?php echo e(config('app.name')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body>
<div class="app-shell" x-data="{ sidebarOpen:false }">
    <div class="mobile-overlay" x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen=false"></div>
    <aside class="sidebar" :class="{'is-open': sidebarOpen}">
        <div class="brand-wrap">
            <div class="brand-mark">S</div>
            <div><div class="brand-title">Sawit DB</div><div class="brand-subtitle">Operations Intelligence</div></div>
            <button class="icon-btn d-lg-none ms-auto" @click="sidebarOpen=false"><i class="bi bi-x-lg"></i></button>
        </div>
        <nav class="nav-stack">
            <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a>
            <a href="<?php echo e(route('trips.index')); ?>" class="nav-link <?php echo e(request()->routeIs('trips.*') ? 'active' : ''); ?>"><i class="bi bi-truck-flatbed"></i><span>Trip Sawit</span></a>
            <a href="<?php echo e(route('reports.index')); ?>" class="nav-link <?php echo e(request()->routeIs('reports.*') ? 'active' : ''); ?>"><i class="bi bi-bar-chart-line-fill"></i><span>Laporan</span></a>
        </nav>
        <div class="sidebar-footer">
            <div class="user-card">
                <div class="avatar"><?php echo e(strtoupper(substr(auth()->user()->name,0,1))); ?></div>
                <div class="min-w-0"><strong class="d-block text-truncate"><?php echo e(auth()->user()->name); ?></strong><span><?php echo e(ucfirst(auth()->user()->role)); ?></span></div>
            </div>
            <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?><button class="btn-logout"><i class="bi bi-box-arrow-right"></i> Keluar</button></form>
        </div>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="icon-btn d-lg-none" @click="sidebarOpen=true"><i class="bi bi-list fs-4"></i></button>
                <div><div class="eyebrow">SAWIT DATABASE SYSTEM</div><h1 class="page-title"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1></div>
            </div>
            <?php if(!auth()->user()->isOwner()): ?>
            <a href="<?php echo e(route('trips.create')); ?>" class="btn btn-brand"><i class="bi bi-plus-lg"></i><span class="d-none d-sm-inline">Trip Baru</span></a>
            <?php endif; ?>
        </header>

        <div class="content-wrap">
            <?php if(session('success')): ?><div class="alert alert-success border-0 shadow-sm"><?php echo e(session('success')); ?></div><?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
</div>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\sawit-database-system\resources\views/layouts/app.blade.php ENDPATH**/ ?>