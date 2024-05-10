<?php

namespace App\Service;

class ArraySorterService
{
    public function sortArray(array $input): array
    {
        uasort($input, function ($a, $b) {
            return strnatcmp($a, $b);
        });

        return $input;
    }
}
