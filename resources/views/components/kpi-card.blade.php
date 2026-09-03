@props(['label','value','icon','highlight'=>false])
<div class="kpi-card {{ $highlight ? 'kpi-highlight' : '' }}">
    <div class="kpi-icon"><i class="bi {{ $icon }}"></i></div>
    <span>{{ $label }}</span><strong>{{ $value }}</strong>
</div>
