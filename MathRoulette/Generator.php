<?php

namespace MathRoulette;

use MathRoulette\Exceptions\GeneratorException;

class Generator
{
    /**
     * @var int
     */
    private $max;

    /**
     * Generator constructor.
     * @param int|null $max
     * @throws GeneratorException
     */
    public function __construct($max = null)
    {
        if(is_null($max) == false)
        {
            $this->setMax($max);
        }
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @throws GeneratorException
     * @param int $max
     * @return $this
     */
    public function setMax($max)
    {
        $max = (int) $max;
        if($max <=0 ){
            throw new GeneratorException('Generator expects positive integer number');
        }
        else{
            $this->max = $max;
        }
        return $this;
    }

    /**
     * @see https://www.php.net/manual/ru/function.mt-getrandmax.php
     * @return float|int
     */
    public function getRandomNumber()
    {
        return mt_rand() / mt_getrandmax() * $this->getMax();
    }

}