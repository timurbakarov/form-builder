<?php

namespace Tiix\Form\Field;

use Tiix\Form\Element;

abstract class BaseField extends Element
{
    /**
     * @var
     */
    protected $value;

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
}