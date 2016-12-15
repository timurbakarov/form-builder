<?php

namespace Tiix\Form\Field;

class TextField extends LabelableInputField
{
    /**
     * @return string
     */
    public function id()
    {
        return 'text';
    }

    /**
     * @return string
     */
    public function type()
    {
        return 'text';
    }
}