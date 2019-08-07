<?php

namespace MathRoulette;

use MathRoulette\Exceptions\EmptyRepositoryExceptions;
use MathRoulette\Exceptions\WheelException;
use MathRoulette\Repository\Event;

class Wheel
{
    /**
     * @var Repository;
     */
    private $repository;

    /**
     * @var Generator
     */
    private $generator;

    /**
     * Wheel constructor.
     * @throws \Exception
     * @param Repository|null $repository (you can use Dependency Injection)
     */
    public function __construct($repository = null)
    {
        if(is_object($repository)){
            $this->setRepository($repository);
        }
        else{
            $this->setRepository(
                new Repository()
            );
        }
        //you can use Dependency Injection somewhere
        $this->setGenerator( new Generator());
    }

    /**
     * @param $object
     * @param $probability
     */
    public function addEvent($object, $probability)
    {
        $this->getRepository()->addEvent(
            new Event(
                $object,
                $probability
            )
        );
    }

    /**
     * Spin the wheel
     *
     * @return mixed
     * @throws EmptyRepositoryExceptions
     * @throws Exceptions\GeneratorException
     * @throws WheelException
     */
    public function spin()
    {
        //check repository
        if(count($this->getRepository()->getObjects()) <= 0){
            throw new EmptyRepositoryExceptions('Events repository is empty');
        }

        return $this->getWinner(
                            $this->getGenerator()->setMax(
                                $this->getRepository()->getProbabilitySum()
                            )->getRandomNumber()
        );
    }

    /**
     * @return Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param Repository $repository
     */
    public function setRepository(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->generator;
    }

    /**
     * @param Generator $generator
     */
    public function setGenerator(Generator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param $spinValue
     * @return mixed
     * @throws WheelException
     */
    protected function getWinner($spinValue)
    {
        $remainder = $spinValue;
        foreach ($this->getRepository()->getObjects() as $event){
            $remainder -= $event->getProbability();
            if($remainder <= 0){
                return $event->getObject();
            }
        }
        throw new WheelException('Could not get winner');
    }
}