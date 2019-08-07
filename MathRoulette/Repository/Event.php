<?php

namespace MathRoulette\Repository;
use MathRoulette\Exceptions\EventObjectException;

class Event
{
    private $probability;
    private $object;

    /**
     * Event constructor.
     * @param mixed
     * @throws EventObjectException
     * @param int $probability
     */
    public function __construct($object, $probability)
    {
        $probability = (int) $probability;
        if($probability <= 0){
            throw new EventObjectException('Probability must be positive integer number');
        }
        $this->setProbability($probability);
        $this->setObject($object);
    }

    /**
     * @return mixed
     */
    public function getProbability()
    {
        return $this->probability;
    }

    /**
     * @param mixed $probability
     */
    public function setProbability($probability)
    {
        $this->probability = $probability;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }


}