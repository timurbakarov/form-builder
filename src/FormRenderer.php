<?php

namespace Tiix\Form;

use Tiix\Form\Button\ButtonContract;
use Tiix\Form\Field\FieldContract;

class FormRenderer implements FormRendererInterface
{
    /**
     * @var TemplateEngineInterface
     */
    private $templateEngine;

    /**
     * @var
     */
    private $path;

    public function __construct(TemplateEngineInterface $templateEngine, $path)
    {
        $this->templateEngine = $templateEngine;
        $this->path = rtrim($path, '/') . '/';
    }

    /**
     * @param $view
     * @param array $data
     */
    public function render(Form $form)
    {
        return $this->templateEngine->render($this->path . 'form', [
            'form' => $form,
            'renderer' => $this,
        ]);
    }

    /**
     * @param Form $form
     * @param FieldContract $field
     * @return mixed
     */
    public function renderField(Form $form, FieldContract $field)
    {
        return $this->templateEngine->render($this->path . 'field', [
            'form' => $form,
            'field' => $field,
            'renderer' => $this,
        ]);
    }

    /**
     * @param Form $form
     * @param FieldContract $field
     * @return mixed
     */
    public function renderLabel(Form $form, FieldContract $field)
    {
        return $this->templateEngine->render($this->path . 'label', [
            'form' => $form,
            'field' => $field,
            'renderer' => $this,
        ]);
    }

    /**
     * @param Form $form
     * @param FieldContract $field
     * @return mixed
     */
    public function renderInput(Form $form, FieldContract $field)
    {
        return $this->templateEngine->render($this->path . $field->id(), [
            'form' => $form,
            'field' => $field,
            'renderer' => $this,
        ]);
    }

    /**
     * @return mixed
     */
    public function renderFields(Form $form)
    {
        return $this->templateEngine->render($this->path . 'fields', [
            'form' => $form,
            'renderer' => $this,
        ]);
    }

    /**
     * @param $this
     * @return mixed
     */
    public function renderButtons(Form $form)
    {
        return $this->templateEngine->render($this->path . 'buttons', [
            'form' => $form,
            'renderer' => $this,
        ]);
    }

    /**
     * @param Form $form
     * @param ButtonContract $button
     * @return mixed
     */
    public function renderButton(Form $form, ButtonContract $button)
    {
        return $this->templateEngine->render($this->path . 'buttons/' . $button->id(), [
            'form' => $form,
            'button' => $button,
            'renderer' => $this,
        ]);
    }
}