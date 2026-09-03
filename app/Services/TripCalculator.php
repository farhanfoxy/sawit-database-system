<?php

namespace App\Services;

use InvalidArgumentException;

class TripCalculator
{
    public function calculate(
        float $factoryWeightTon,
        float $normalPricePerTon,
        ?float $badFruitTon,
        ?float $badFruitPricePerTon,
        float $transportCost
    ): array {
        $badFruitTon ??= 0.0;
        $badFruitPricePerTon ??= 0.0;

        if ($factoryWeightTon <= 0) {
            throw new InvalidArgumentException('Tonase pabrik harus lebih dari 0.');
        }
        if ($badFruitTon < 0 || $badFruitTon > $factoryWeightTon) {
            throw new InvalidArgumentException('Tonase sawit buruk tidak valid.');
        }

        $normalTon = $factoryWeightTon - $badFruitTon;
        $normalRevenue = $normalTon * $normalPricePerTon;
        $badFruitRevenue = $badFruitTon * $badFruitPricePerTon;
        $grossRevenue = $normalRevenue + $badFruitRevenue;
        $potentialRevenue = $factoryWeightTon * $normalPricePerTon;
        $qualityLoss = max(0, $potentialRevenue - $grossRevenue);

        return [
            'normal_ton' => round($normalTon, 3),
            'normal_revenue' => round($normalRevenue, 2),
            'bad_fruit_revenue' => round($badFruitRevenue, 2),
            'gross_revenue' => round($grossRevenue, 2),
            'net_after_transport' => round($grossRevenue - $transportCost, 2),
            'potential_revenue' => round($potentialRevenue, 2),
            'quality_loss' => round($qualityLoss, 2),
            'bad_fruit_rate' => round(($badFruitTon / $factoryWeightTon) * 100, 2),
        ];
    }
}
