<?php

namespace Tiix\Form\Field;

class NumberField extends TextField
{
    /**
     * @return string
     */
    public function type()
    {
        return 'number';
    }
}