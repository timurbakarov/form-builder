<?php

namespace Tiix\Form;

trait LabelableTrait
{
    /**
     * @var
     */
    protected $label;

    /**
     * @return string
     */
    public function label()
    {
        return $this->label ?: ucfirst($this->name());
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}