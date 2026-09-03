<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sawit Database') · {{ config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
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
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a>
            <a href="{{ route('trips.index') }}" class="nav-link {{ request()->routeIs('trips.*') ? 'active' : '' }}"><i class="bi bi-truck-flatbed"></i><span>Trip Sawit</span></a>
            <a href="{{ route('reports.index') }}" class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}"><i class="bi bi-bar-chart-line-fill"></i><span>Laporan</span></a>
        </nav>
        <div class="sidebar-footer">
            <div class="user-card">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
                <div class="min-w-0"><strong class="d-block text-truncate">{{ auth()->user()->name }}</strong><span>{{ ucfirst(auth()->user()->role) }}</span></div>
            </div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn-logout"><i class="bi bi-box-arrow-right"></i> Keluar</button></form>
        </div>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="icon-btn d-lg-none" @click="sidebarOpen=true"><i class="bi bi-list fs-4"></i></button>
                <div><div class="eyebrow">SAWIT DATABASE SYSTEM</div><h1 class="page-title">@yield('page-title', 'Dashboard')</h1></div>
            </div>
            @if(!auth()->user()->isOwner())
            <a href="{{ route('trips.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg"></i><span class="d-none d-sm-inline">Trip Baru</span></a>
            @endif
        </header>

        <div class="content-wrap">
            @if(session('success'))<div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>@endif
            @yield('content')
        </div>
    </main>
</div>
@stack('scripts')
</body>
</html>
