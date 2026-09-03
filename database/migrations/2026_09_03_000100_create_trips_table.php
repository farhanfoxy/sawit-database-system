<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_number', 32)->unique();
            $table->date('transaction_date')->index();
            $table->decimal('factory_weight_ton', 10, 3);
            $table->decimal('normal_price_per_ton', 15, 2);
            $table->decimal('bad_fruit_ton', 10, 3)->nullable();
            $table->decimal('bad_fruit_price_per_ton', 15, 2)->nullable();
            $table->decimal('transport_cost', 15, 2)->default(0);
            $table->string('weigh_ticket_number', 100)->nullable()->index();
            $table->enum('payment_status', ['draft', 'paid', 'cancelled'])->default('draft')->index();
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $table->timestamp('finalized_at')->nullable();
            $table->timestamps();
            $table->index(['transaction_date', 'payment_status']);
        });
    }
    public function down(): void { Schema::dropIfExists('trips'); }
};
