<?php

namespace Tiix\Form;

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
        $this->path = $path;
    }

    /**
     * @param $view
     * @param array $data
     */
    public function render(Form $form)
    {
        return $this->templateEngine->render($this->path . 'form', [
            'form' => $form,
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
}