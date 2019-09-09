<?php
/**
 * Remove if using composer
 */
require_once dirname(__FILE__) . '/MathRoulette/Generator.php';
require_once dirname(__FILE__) . '/MathRoulette/Repository.php';
require_once dirname(__FILE__) . '/MathRoulette/Repository/Event.php';
require_once dirname(__FILE__) . '/MathRoulette/Exceptions/EmptyRepository.php';
require_once dirname(__FILE__) . '/MathRoulette/Exceptions/EventObjectException.php';
require_once dirname(__FILE__) . '/MathRoulette/Exceptions/GeneratorException.php';
require_once dirname(__FILE__) . '/MathRoulette/Exceptions/WheelException.php';
require_once dirname(__FILE__) . '/MathRoulette/Wheel.php';

// random roulette number
$roulette = new \MathRoulette\Wheel();
for($i=0; $i<=36; $i++){
    $roulette->addEvent($i, 1);
}
echo "\n".$roulette->spin();

// you can use any object as the first parameter in addEvent method
// and positive integer number of probability as second parameter
$roulette = new \MathRoulette\Wheel();
$roulette->addEvent('you are hired', 60);
$roulette->addEvent('you are not hired', 40);

echo  "\n".$roulette->spin();

