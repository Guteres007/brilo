<?php

namespace App\Dto\Crypto;

use Symfony\Component\Validator\Constraints as Assert;

class BitcoinPriceDto
{
    public function __construct(
        public readonly TimeInfo $time,

        #[Assert\NotBlank, Assert\Type('string')]
        public readonly string $disclaimer,

        #[Assert\NotBlank, Assert\Type('string')]
        public readonly string $chartName,

        public readonly BitcoinPriceIndex $bpi
    ) {
    }
}
