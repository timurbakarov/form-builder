<?php

namespace Tiix\Form\Field;

abstract class BaseField implements FieldContract
{
    /**
     * @var
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
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