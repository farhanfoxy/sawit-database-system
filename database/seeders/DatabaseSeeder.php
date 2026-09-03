<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@sawit.local'], [
            'name' => 'Administrator', 'password' => Hash::make('ChangeMe123!'), 'role' => 'admin', 'is_active' => true,
        ]);
        User::updateOrCreate(['email' => 'owner@sawit.local'], [
            'name' => 'Owner', 'password' => Hash::make('ChangeMe123!'), 'role' => 'owner', 'is_active' => true,
        ]);

        foreach ([
            'company_name' => 'Perusahaan Sawit',
            'estate_name' => 'Kebun Utama',
            'estate_area' => '50',
            'currency' => 'IDR',
        ] as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
