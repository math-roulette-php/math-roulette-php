<?php

namespace MathRoulette;

use MathRoulette\Exceptions\EventObjectException;

class Repository
{
    /**
     * @var Repository\Event[];
     */
    private $objects = [];

    /**
     * Repository constructor.
     * @throws EventObjectException
     * @param Repository\Event[] $objects
     */
    public function __construct($objects = [])
    {
        if (is_array($objects)){
            foreach ($objects as $object){
                if(is_a($object, '\\MathRoulette\\Repository\\Event')){
                    $this->addEvent($object);
                }
                else{
                    throw new EventObjectException('Object is not Event');
                }
            }
        }
    }

    /**
     * @param Repository\Event $object
     */
    public function addEvent( Repository\Event $object )
    {
        array_push($this->objects, $object);
    }

    /**
     * @return Repository\Event[]
     */
    public function getObjects()
    {
        return $this->objects;
    }

    /**
     * @param Repository\Event[] $objects
     */
    public function setObjects($objects)
    {
        $this->objects = $objects;
    }

    /**
     * @return int|mixed
     */
    public function getProbabilitySum()
    {
        $sum = 0;
        foreach ($this->getObjects() as $event)
        {
            $sum += $event->getProbability();
        }
        return $sum;
    }
}