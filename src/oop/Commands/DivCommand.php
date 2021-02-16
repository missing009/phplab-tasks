<?php


namespace src\oop\Commands;


class DivCommand implements CommandInterface
{

    /**
     * @inheritDoc
     */
    public function execute(...$args)
    {
        // TODO: Implement execute() method.
        if (2 != sizeof($args)) {
            throw new \InvalidArgumentException('Not enough parameters');
        }

        return $args[0] / $args[1];
    }
}