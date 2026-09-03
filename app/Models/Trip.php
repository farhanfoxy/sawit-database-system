<?php

namespace App\Models;

use App\Services\TripCalculator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_number', 'transaction_date', 'factory_weight_ton', 'normal_price_per_ton',
        'bad_fruit_ton', 'bad_fruit_price_per_ton', 'transport_cost', 'weigh_ticket_number',
        'payment_status', 'notes', 'created_by', 'finalized_at',
    ];

    protected function casts(): array
    {
        return [
            'transaction_date' => 'date',
            'factory_weight_ton' => 'decimal:3',
            'normal_price_per_ton' => 'decimal:2',
            'bad_fruit_ton' => 'decimal:3',
            'bad_fruit_price_per_ton' => 'decimal:2',
            'transport_cost' => 'decimal:2',
            'finalized_at' => 'datetime',
        ];
    }

    protected $appends = [
        'normal_ton', 'normal_revenue', 'bad_fruit_revenue', 'gross_revenue',
        'net_after_transport', 'potential_revenue', 'quality_loss', 'bad_fruit_rate',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    private function calc(): array
    {
        return app(TripCalculator::class)->calculate(
            (float) $this->factory_weight_ton,
            (float) $this->normal_price_per_ton,
            $this->bad_fruit_ton !== null ? (float) $this->bad_fruit_ton : null,
            $this->bad_fruit_price_per_ton !== null ? (float) $this->bad_fruit_price_per_ton : null,
            (float) $this->transport_cost,
        );
    }

    public function getNormalTonAttribute(): float { return $this->calc()['normal_ton']; }
    public function getNormalRevenueAttribute(): float { return $this->calc()['normal_revenue']; }
    public function getBadFruitRevenueAttribute(): float { return $this->calc()['bad_fruit_revenue']; }
    public function getGrossRevenueAttribute(): float { return $this->calc()['gross_revenue']; }
    public function getNetAfterTransportAttribute(): float { return $this->calc()['net_after_transport']; }
    public function getPotentialRevenueAttribute(): float { return $this->calc()['potential_revenue']; }
    public function getQualityLossAttribute(): float { return $this->calc()['quality_loss']; }
    public function getBadFruitRateAttribute(): float { return $this->calc()['bad_fruit_rate']; }
}
