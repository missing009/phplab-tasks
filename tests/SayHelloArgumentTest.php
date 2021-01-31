<?php


use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($input));
    }

    public function positiveDataProvider()
    {
        return [
            [0, 'Hello 0'],
            [55, 'Hello 555'],
            ['mm', 'Hello mm '],
        ];
    }
}
