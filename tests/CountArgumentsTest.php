<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    public function testPositive($arg, $expected)
    {
        $this->assertEquals($expected, countArguments(...$arg));
    }

    public function positiveDataProvider()
    {
        return [
            [[], ['argument_count' => 0, 'argument_values' => []]],
            [['string'], ['argument_count' => 1, 'argument_values' => ['string']]],
            [['string', 'string'], ['argument_count' => 2, 'argument_values' => ['string', 'string']]],
            [['string', 'string','string'], ['argument_count' => 3, 'argument_values' => ['string', 'string','string']]],

        ];
    }

}
