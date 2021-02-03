<?php


use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{

    public function testPositive()
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper([22,22,'we']);
    }
    public function positiveDataProvider()
    {
        return [
            [0, 'Hello 0'],
            ['world', 'Hello world'],
            [null],

        ];
    }
}