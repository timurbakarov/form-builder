<?php

namespace Tiix\Form\Field;

class HiddenField extends InputField
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
        return 'hidden';
    }
}