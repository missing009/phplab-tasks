<?php
use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    public function testPositive(...$input)
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper($input);    }
    /**
     * @return array
     */
    public function positiveDataProvider(): array
    {
        return [
            [1,2],
            [['hello']],
            [],
    ];
    }
}
