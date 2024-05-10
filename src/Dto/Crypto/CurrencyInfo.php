<?php

namespace App\Dto\Crypto;

use Symfony\Component\Validator\Constraints as Assert;

class CurrencyInfo
{
    public function __construct(
        #[Assert\NotBlank, Assert\Type('string')]
        public readonly string $code,

        #[Assert\NotBlank, Assert\Type('string')]
        public readonly string $symbol,

        #[Assert\NotBlank, Assert\Type('integer')]
        public readonly string $rate,

        #[Assert\NotBlank]
        public readonly string $description,

        #[Assert\Type('float')]
        public readonly float $rate_float
    ) {
    }
}
