<?php

namespace Tiix\Form\Field;

use Tiix\Form\Labelable;
use Tiix\Form\LabelableTrait;

class TextAreaField extends BaseField implements Labelable
{
    use LabelableTrait;

    /**
     * @return string
     */
    public function id()
    {
        return 'textarea';
    }
}