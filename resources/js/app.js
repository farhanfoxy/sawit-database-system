import 'bootstrap';
import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import Chart from 'chart.js/auto';

window.bootstrap = bootstrap;
window.Chart = Chart;

Alpine.plugin(collapse);
window.Alpine = Alpine;

window.tripForm = (initial) => ({
    weight: Number(initial.weight || 0), normalPrice: Number(initial.normalPrice || 0), transport: Number(initial.transport || 0),
    hasBad: Boolean(initial.hasBad), badTon: Number(initial.badTon || 0), badPrice: Number(initial.badPrice || 0),
    get normalTon(){ return Math.max(0, this.weight - (this.hasBad ? this.badTon : 0)); },
    get normalRevenue(){ return this.normalTon * this.normalPrice; },
    get badRevenue(){ return this.hasBad ? this.badTon * this.badPrice : 0; },
    get gross(){ return this.normalRevenue + this.badRevenue; },
    get net(){ return this.gross - this.transport; },
    get potential(){ return this.weight * this.normalPrice; },
    get qualityLoss(){ return Math.max(0, this.potential - this.gross); },
    parseMoney(value) {
    return Number(String(value || '').replace(/[^\d]/g, '')) || 0;
    },
    formatMoneyInput(value) {
    const raw = this.parseMoney(value);
    return raw
        ? new Intl.NumberFormat('en-US', {
            maximumFractionDigits: 0
        }).format(raw)
        : '';},
    rupiah(v){ return 'Rp' + new Intl.NumberFormat('id-ID', {maximumFractionDigits:0}).format(Number(v || 0)); },
    fmtTon(v){ return new Intl.NumberFormat('id-ID', {minimumFractionDigits:3,maximumFractionDigits:3}).format(Number(v || 0)) + ' ton'; },
});
window.moneyInput = function (initialValue = '') {
    return {
        display: '',

        init() {
            this.setValue(initialValue);
        },

        setValue(value) {
            const raw = String(value ?? '').replace(/[^\d]/g, '');

            this.display = raw
                ? Number(raw).toLocaleString('en-US')
                : '';
        },

        rawValue() {
            return this.display.replace(/,/g, '');
        }
    };
};
Alpine.start();
