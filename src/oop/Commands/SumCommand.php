<?php

namespace src\oop\Commands;

use InvalidArgumentException;

/**
 * Class SumCommand
 * @package src\oop\Commands
 */
class SumCommand implements CommandInterface
{
    /**
     * @inheritdoc
     */
    public function execute(...$args)
    {
        if (2 != sizeof($args)) {
            throw new InvalidArgumentException('Not enough parameters');
        }

        return $args[0] + $args[1];
    }
}