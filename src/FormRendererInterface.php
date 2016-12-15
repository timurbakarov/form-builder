<?php

namespace Tiix\Form;

use Tiix\Form\Button\BaseButton;
use Tiix\Form\Field\BaseField;

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
     * @param BaseField $field
     * @return mixed
     */
    public function renderField(Form $form, BaseField $field);

    /**
     * @param BaseField $field
     * @return mixed
     */
    public function renderLabel(Form $form, BaseField $field);

    /**
     * @param BaseField $field
     * @return mixed
     */
    public function renderInput(Form $form, BaseField $field);

    /**
     * @param $this
     * @return mixed
     */
    public function renderButtons(Form $form);

    /**
     * @param Form $form
     * @param BaseButton $button
     * @return mixed
     */
    public function renderButton(Form $form, BaseButton $button);
}