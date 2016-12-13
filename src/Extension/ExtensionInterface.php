<?php

namespace Tiix\Form\Extension;

use Tiix\Form\Builder;
use Tiix\Form\Form;

interface ExtensionInterface
{
    /**
     * @param Builder $builder
     * @param Form $form
     * @return mixed
     */
    public function buildForm(Builder $builder, Form $form);
}