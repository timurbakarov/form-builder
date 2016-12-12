<?php

namespace Tiix\Form\Renderer;

use Tiix\Form\Button\Submit;
use Tiix\Form\Exception;
use Tiix\Form\Field\TextField;
use Tiix\Form\Form;
use Tiix\Form\FormRenderer;

class Bootstrap3Renderer extends FormRenderer
{
    const TYPE_BASIC = 'basic';
    const TYPE_INLINE = 'inline';
    const TYPE_HORIZONTAL = 'horizontal';

    /**
     * @var
     */
    protected $type = self::TYPE_BASIC;

    /**
     * @param $type
     * @return bool
     */
    public function isType($type)
    {
        return $this->type == $type;
    }

    /**
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        if(!in_array($type, $this->validTypes())) {
            throw new Exception("[$type] is not valid type");
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function validTypes()
    {
        return [
            self::TYPE_BASIC,
            self::TYPE_HORIZONTAL,
            self::TYPE_INLINE,
        ];
    }
}