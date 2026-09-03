<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('sawit:status', function () {
    $this->info('Sawit Database System is ready.');
})->purpose('Check application bootstrap status');
