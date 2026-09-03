<?php

namespace Tests\Unit;

use App\Services\TripCalculator;
use PHPUnit\Framework\TestCase;

class TripCalculatorTest extends TestCase
{
    public function test_normal_trip_calculation(): void
    {
        $result = (new TripCalculator)->calculate(10, 2_500_000, null, null, 1_000_000);
        $this->assertSame(25_000_000.0, $result['gross_revenue']);
        $this->assertSame(24_000_000.0, $result['net_after_transport']);
        $this->assertSame(0.0, $result['quality_loss']);
    }

    public function test_bad_fruit_reduces_revenue(): void
    {
        $result = (new TripCalculator)->calculate(10, 2_500_000, 1, 1_500_000, 1_000_000);
        $this->assertSame(9.0, $result['normal_ton']);
        $this->assertSame(24_000_000.0, $result['gross_revenue']);
        $this->assertSame(23_000_000.0, $result['net_after_transport']);
        $this->assertSame(1_000_000.0, $result['quality_loss']);
        $this->assertSame(10.0, $result['bad_fruit_rate']);
    }
}
