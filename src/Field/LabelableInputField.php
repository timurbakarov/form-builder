<?php

namespace Tiix\Form\Field;

use Tiix\Form\Labelable;
use Tiix\Form\LabelableTrait;

abstract class LabelableInputField extends InputField implements Labelable
{
    use LabelableTrait;
}