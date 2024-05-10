<?php

namespace App\Dto\Crypto;

class BitcoinPriceIndex
{
    public function __construct(
        public readonly CurrencyInfo $USD,
        public readonly CurrencyInfo $GBP,
        public readonly CurrencyInfo $EUR
    ) {
    }
}
