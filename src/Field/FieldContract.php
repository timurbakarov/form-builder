<?php

namespace Tiix\Form\Field;

interface FieldContract
{
    /**
     * @return string
     */
    public function id();

    /**
     * @return string
     */
    public function name();

    /**
     * @param $data
     * @return bool
     */
    public function isValid(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function processRequestData(array $data);

    /**
     * @param $value
     * @return mixed
     */
    public function setValue($value);

    /**
     * @return mixed
     */
    public function value();

    /**
     * @param $label string
     * @return $this
     */
    public function setLabel($label);

    /**
     * @return string
     */
    public function label();
}