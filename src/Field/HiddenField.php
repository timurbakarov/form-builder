<?php

namespace Tiix\Form\Field;

use Tiix\Form\Typeable;

class HiddenField extends BaseField implements Typeable
{
    /**
     * @return string
     */
    public function type()
    {
        return 'hidden';
    }
}