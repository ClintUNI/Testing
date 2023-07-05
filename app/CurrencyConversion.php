<?php

namespace App;

class CurrencyConversion
{
    /**
     * @var array
     */
    private array $currency = [
        'usd' => [
            'eur' => 1.1
        ]
    ];

    private int $value;

    /**
     * Constructor. Set up the conversion.
     *
     * @param int $amount
     * @param int $currencyFrom
     * @param int $currencyTo
     */
    public function __construct(int $amount, string $currencyFrom, string $currencyTo)
    {
        $this->value = round($this->currency[$currencyFrom][$currencyTo] * $amount);
    }

    /**
     * Return the conversion value.
     *
     * @return int
     */
    public function getConversion(): int
    {
        return $this->value;
    }
}
