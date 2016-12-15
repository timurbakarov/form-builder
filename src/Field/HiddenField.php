<?php

namespace Tiix\Form\Field;

class HiddenField extends TextField
{
    /**
     * @return string
     */
    public function type()
    {
        return 'hidden';
    }
}