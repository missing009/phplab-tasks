<?php


use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{

    public function testNegative(...$input)
    {

        $this->expectException(InvalidArgumentException::class);

        countArgumentsWrapper($input);    }

    public function negativeDataProvider()
    {
        return [

            [1,1,2],
            ['string',[1,1,3]],
            [],
    ];

    }
}
