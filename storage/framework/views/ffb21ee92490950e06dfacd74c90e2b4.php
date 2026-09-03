<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Masuk · Sawit Database</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body class="login-body">
<div class="login-shell">
    <section class="login-brand-panel">
        <div class="login-brand-content">
            <div class="brand-mark brand-mark-xl">S</div>
            <p class="eyebrow text-white-50 mt-4">LOCAL-FIRST OPERATIONS SYSTEM</p>
            <h1>Data kebun yang lebih jelas. Keputusan yang lebih cepat.</h1>
            <p>Monitor tonase, harga, kualitas sawit, transportasi, dan pendapatan dalam satu sistem yang rapi.</p>
            <div class="login-kpis"><span><b>100%</b> Local data</span><span><b>Audit</b> Ready</span><span><b>Responsive</b> Mobile & PC</span></div>
        </div>
    </section>
    <section class="login-form-panel">
        <form method="POST" action="<?php echo e(route('login.attempt')); ?>" class="login-card"><?php echo csrf_field(); ?>
            <div class="d-lg-none brand-mark mb-4">S</div>
            <p class="eyebrow">WELCOME BACK</p><h2>Masuk ke Sawit DB</h2><p class="text-muted mb-4">Gunakan akun internal perusahaan.</p>
            <?php if($errors->any()): ?><div class="alert alert-danger"><?php echo e($errors->first()); ?></div><?php endif; ?>
            <label class="form-label">Email</label><input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control form-control-lg" required autofocus>
            <label class="form-label mt-3">Password</label><input type="password" name="password" class="form-control form-control-lg" required>
            <div class="form-check mt-3"><input class="form-check-input" type="checkbox" name="remember" value="1" id="remember"><label class="form-check-label" for="remember">Ingat saya</label></div>
            <button class="btn btn-brand btn-lg w-100 mt-4">Masuk <i class="bi bi-arrow-right ms-2"></i></button>
        </form>
    </section>
</div>
</body>
</html>
<?php /**PATH C:\laragon\www\sawit-database-system\resources\views/auth/login.blade.php ENDPATH**/ ?>