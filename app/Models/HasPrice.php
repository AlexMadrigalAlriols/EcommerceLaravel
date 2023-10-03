<?php

namespace App\Models;

use App\Helpers\CurrencyHelper;

trait HasPrice
{
    protected function priceFloat(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return new \Illuminate\Database\Eloquent\Casts\Attribute(
            get: fn ($value) => $this->price && $this->currency
                ? CurrencyHelper::convertIntToFloat($this->price, $this->currency)
                : null
        );
    }

    protected function priceFloatRounded(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return new \Illuminate\Database\Eloquent\Casts\Attribute(
            get: fn ($value) => $this->price && $this->currency
                ? CurrencyHelper::convertIntToFloatRounded($this->price, $this->currency)
                : null
        );
    }

    protected function priceString(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return new \Illuminate\Database\Eloquent\Casts\Attribute(
            get: fn ($value) => $this->price && $this->currency
                    ? CurrencyHelper::displayPrice($this->price, $this->currency)
                    : null
        );
    }
}
