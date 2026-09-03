<?php

namespace App\Support;

class Money
{
    public static function rupiah(float|int|string|null $value): string
    {
        return 'Rp'.number_format((float) $value, 0, ',', '.');
    }
}
