# math-roulette-php

Fitness proportionate selection, also known as roulette wheel selection

## Setup ##

 Add a `composer.json` file to your project:

```javascript
{
  "require": {
      "math-roulette-php/math-roulette-php": "*"
  }
}
```

Then provided you have [composer](http://getcomposer.org) installed, you can run the following command:

```bash
$ composer.phar install
```

## Usage ##

Create an instance of the class and add events / objects to it with a probability of more than zero

```php
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
```
