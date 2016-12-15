<?php

namespace Tiix\Form\Field;

use Tiix\Form\Labelable;
use Tiix\Form\LabelableTrait;
use Tiix\Form\Typeable;

class NumberField extends BaseField implements Typeable, Labelable
{
    use LabelableTrait;

    /**
     * @return string
     */
    public function type()
    {
        return 'number';
    }
}