<?php
use src\oop\Calculator;
use src\oop\Commands\DivCommand;
use src\oop\Commands\ExpoCommand;
use src\oop\Commands\MultiCommand;
use src\oop\Commands\SubCommand;
use src\oop\Commands\SumCommand;

$calc = new Calculator();
$calc->addCommand('+', new SumCommand());
$calc->addCommand('-', new SubCommand());
$calc->addCommand('*', new MultiCommand());
$calc->addCommand('**', new ExpoCommand());
$calc->addCommand('/', new DivCommand());



echo PHP_EOL. '<br/>';
// Multiply operations
// will output 10
echo $calc->init(15)
    ->compute('+', 5)
    ->compute('-', 10)
    ->getResult();

echo PHP_EOL. '<br/>';
// TODO implement replay method
// should output 2
echo $calc->init(1)
    ->compute('+', 1)
    ->getResult();

echo PHP_EOL. '<br/>';
//(*)
// should output 10

echo $calc->init(5)
    ->compute('*', 2)
    ->getResult();

echo PHP_EOL. '<br/>';

//(/)
// should output 4
echo $calc->init(8)
    ->compute('/', 2)
    ->getResult();

echo PHP_EOL. '<br/>';
//(**)
// should output 125

echo $calc->init(5)
    ->compute('**', 3)
    ->getResult();

echo PHP_EOL. '<br/>';
// TODO implement undo method
// should output 1
echo $calc->init(1)
    ->compute('+', 5)
    ->compute('+', 5)
    ->undo()
    ->undo()
    ->getResult();

echo PHP_EOL. '<br/>';
// should output 2
echo $calc->init(4)
    ->compute('-', 2)
    ->getResult();

echo PHP_EOL. '<br/>';
