<?php

namespace Tiix\Form;

interface Labelable
{
    /**
     * @return mixed
     */
    public function label();

    /**
     * @param $label
     * @return mixed
     */
    public function setLabel($label);
}