<?php

namespace Tiix\Form;

abstract class Element
{
    use OptionsTrait;

    /**
     * @var
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    abstract public function id();

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }


}