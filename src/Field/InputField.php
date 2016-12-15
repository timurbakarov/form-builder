<?php

namespace Tiix\Form\Field;

abstract class InputField extends BaseField
{
    /**
     * @return string
     */
    abstract public function type();
}