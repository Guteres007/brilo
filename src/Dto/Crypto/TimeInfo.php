<?php

namespace App\Dto\Crypto;

use Symfony\Component\Validator\Constraints as Assert;

class TimeInfo
{
    public function __construct(
        #[Assert\DateTime]
        public readonly string $updated,

        #[Assert\DateTime]
        public readonly string $updatedISO,

        #[Assert\NotBlank]
        public readonly string $updateduk
    ) {
    }
}
