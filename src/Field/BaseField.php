<?php

namespace Tiix\Form\Field;

abstract class BaseField implements FieldContract
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $value;

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
     * @param array $data
     * @return bool|mixed
     */
    public function processRequestData(array $data)
    {
        return $data[$this->name()];
    }

    /**
     * @param array $data
     * @return bool
     */
    public function isValid(array $data)
    {
        return isset($data[$this->name()]);
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
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