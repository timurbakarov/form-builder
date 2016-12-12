<?php

namespace Tiix\Form;

use Tiix\Form\Field\FieldContract;

interface FormRendererInterface
{
    /**
     * @param $view
     * @param array $data
     */
    public function render(Form $form);

    /**
     * @param FieldContract $field
     * @return mixed
     */
    public function renderField(Form $form, FieldContract $field);

    /**
     * @param FieldContract $field
     * @return mixed
     */
    public function renderLabel(Form $form, FieldContract $field);

    /**
     * @param FieldContract $field
     * @return mixed
     */
    public function renderInput(Form $form, FieldContract $field);
}