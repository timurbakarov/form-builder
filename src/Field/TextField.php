<?php

namespace Tiix\Form\Field;

class TextField extends BaseField
{
    /**
     * @var string
     */
    protected $type = 'text';

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
        return $this->type;
    }
}