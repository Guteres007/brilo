<?php

namespace App\Tests\Service;

use App\Service\ArraySorterService;
use PHPUnit\Framework\TestCase;

class ArraySorterTest extends TestCase
{
    public function testSortArray()
    {
        $sorter = new ArraySorterService();
        $input = [
            '0' => 'ahoj1',
            '1' => 'Ahoj10',
            '2' => 'ahoj12',
            '3' => 'Ahoj2',
            '4' => 'ahoj3',
        ];

        $expected = [
            '0' => 'ahoj1',
            '3' => 'Ahoj2',
            '4' => 'ahoj3',
            '1' => 'Ahoj10',
            '2' => 'ahoj12',
        ];

        $result = $sorter->sortArray($input);
        $this->assertEquals($expected, $result, "The array should be sorted by natural order of numbers in strings.");
    }
}
