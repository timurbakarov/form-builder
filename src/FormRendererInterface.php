<?php

namespace Tiix\Form;

use Tiix\Form\Button\ButtonContract;
use Tiix\Form\Field\FieldContract;

interface FormRendererInterface
{
    /**
     * @param $view
     * @param array $data
     */
    public function render(Form $form);

    /**
     * @return mixed
     */
    public function renderFields(Form $form);

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

    /**
     * @param $this
     * @return mixed
     */
    public function renderButtons(Form $form);

    /**
     * @param Form $form
     * @param ButtonContract $button
     * @return mixed
     */
    public function renderButton(Form $form, ButtonContract $button);
}