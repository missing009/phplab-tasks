<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($arg, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($arg));
    }

    /**
     * @return array
     */
    public function positiveDataProvider(): array
    {
        return [
            [0, 'Hello 0'],
            ['world', 'Hello world'],
            [true, 'Hello 1'],

        ];
    }
}