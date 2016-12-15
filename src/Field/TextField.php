<?php

namespace Tiix\Form\Field;

use Tiix\Form\Labelable;
use Tiix\Form\LabelableTrait;
use Tiix\Form\Typeable;

class TextField extends BaseField implements Typeable, Labelable
{
    use LabelableTrait;

    /**
     * @return string
     */
    public function type()
    {
        return 'text';
    }
}