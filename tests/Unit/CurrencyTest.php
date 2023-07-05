<?php

namespace Tests\Unit;

use App\CurrencyConversion;
use App\Models\Product;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{

    public function test_convert_usd_to_eur_succesful(): void
    {
        $product = new CurrencyConversion(100, 'usd', 'eur');

        $this->assertEquals(110, $product->getConversion());
    }
}
