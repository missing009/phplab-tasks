<?php


use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{

    public function testNegative()
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper([22,22,'we']);
    }
}