<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, countArguments(...$input));
    }

    /**
     * @return array[]
     */
    public function positiveDataProvider(): array
    {
        return [
            [[], ['argument_count' => 0, 'argument_values' => [],]],
            [['string'], ['argument_count' => 1, 'argument_values' => ['string'],]],
            [['first', 'second'], ['argument_count' => 2, 'argument_values' => ['first', 'second'],]],
        ];
    }

}
