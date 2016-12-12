<?php

namespace Tiix\Form\Button;

interface ButtonContract
{
    /**
     * @return string
     */
    public function id();

    /**
     * @return string
     */
    public function name();
}