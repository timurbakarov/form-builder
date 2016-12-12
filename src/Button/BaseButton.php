<?php

namespace Tiix\Form\Button;

abstract class BaseButton implements ButtonContract
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $label;

    public function __construct($name, $label = null)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function label()
    {
        return $this->label ?: ucfirst($this->name());
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}