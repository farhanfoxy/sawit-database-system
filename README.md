# Sawit Database System

Local-first web application untuk operasional kebun sawit: pencatatan trip dari laporan mandor, tonase timbang pabrik, harga per ton, sawit kualitas rendah, biaya transport, bukti timbang/pembayaran, dashboard, dan laporan.

## V1 Scope
- Admin & Owner login
- Trip sawit: Draft / Paid / Cancelled
- Factory weight sebagai sumber tonase transaksi
- Harga per ton dimasukkan per trip
- Sawit buruk opsional dan dihargai terpisah
- Transport cost per trip
- Gross Revenue, Net After Transport, Quality Loss otomatis
- Private attachment storage untuk bukti timbang & pembayaran
- Audit log untuk create/update/cancel
- Dashboard responsive mobile + desktop
- Reports berdasarkan periode

## Stack
- Laravel 12 / PHP 8.2+
- Laravel Blade
- Bootstrap 5
- Alpine.js
- Chart.js
- MySQL Community
- Vite
- Git / GitHub

## Formula
```
normal_ton = factory_weight_ton - bad_fruit_ton
normal_revenue = normal_ton * normal_price_per_ton
bad_fruit_revenue = bad_fruit_ton * bad_fruit_price_per_ton
gross_revenue = normal_revenue + bad_fruit_revenue
net_after_transport = gross_revenue - transport_cost
potential_revenue = factory_weight_ton * normal_price_per_ton
quality_loss = potential_revenue - gross_revenue
```

## Local Setup
1. Install PHP 8.2+, Composer, MySQL, Node.js 20+.
2. Clone repository.
3. `composer install`
4. `cp .env.example .env`
5. Create MySQL database: `sawit_database`
6. Adjust `.env` DB credentials.
7. `php artisan key:generate`
8. `php artisan migrate --seed`
9. `npm install`
10. `npm run build`
11. `php artisan serve`

Default local seeded accounts (CHANGE IMMEDIATELY):
- `admin@sawit.local` / `ChangeMe123!`
- `owner@sawit.local` / `ChangeMe123!`

## Git workflow
- `main`: production-ready
- `develop`: integration
- `feature/<module>`: feature work

Never commit `.env`, client database dumps, payment evidence, or weighbridge documents.

## Architecture principle
Raw transaction inputs are persisted. Derived financial metrics are computed from a single `TripCalculator` service to prevent inconsistent duplicate calculations across screens.
