<?php

namespace Tiix\Form\Button;

use Tiix\Form\Element;
use Tiix\Form\Labelable;
use Tiix\Form\LabelableTrait;

abstract class BaseButton extends Element implements Labelable
{
    use LabelableTrait;
}