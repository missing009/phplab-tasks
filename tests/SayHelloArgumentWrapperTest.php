<?php


use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{

    public function testPositive()
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper([22,22,'we']);
    }

    /**
     * @return array
     */
    public function positiveDataProvider(): array
    {
        return [
            [0, 'Hello 0'],
            ['world', 'Hello world'],
            [null],

        ];
    }
}