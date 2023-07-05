<?php

namespace App\Models;

use App\CurrencyConversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'quantity'];

    public function totalPrice(): int
    {
        return $this->price * $this->quantity;
    }

    public function totalPriceToEUR(): int
    {
        $convertedValue = new CurrencyConversion($this->totalPrice(), 'usd', 'eur');

        return $convertedValue->getConversion();
    }
}
