<?php

namespace Tiix\Form;

use Tiix\Form\Button\ButtonContract;
use Tiix\Form\Field\FieldContract;

class Builder
{
    /**
     * @var FormRendererInterface
     */
    private $renderer;

    /**
     * @var Form
     */
    private $form;

    /**
     * @var array
     */
    private $defaultValues = [];

    public function __construct(FormRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @return Builder
     */
    public static function createDefaultBuilder($path = null)
    {
        $path = $path ?: __DIR__ . '/../resources/views/simple';

        return new self(new FormRenderer(new SimpleTemplateEngine(), $path));
    }

    /**
     * @param Form $form
     * @return $this
     */
    public function build($formClassName, $action, array $defaultValues = [])
    {
        $form = new $formClassName($action, $this->renderer);

        $builder = new Builder($this->renderer);
        $builder->setForm($form);
        $builder->setDefaultValues($defaultValues);

        return $builder;
    }

    /**
     * @param ButtonContract $action
     * @return $this
     */
    public function addButton(ButtonContract $button)
    {
        $this->form->addButton($button);

        return $this;
    }

    /**
     * @param FieldContract $field
     * @return $this
     */
    public function addField(FieldContract $field)
    {
        if(isset($this->defaultValues[$field->name()])) {
            $field->setValue($this->defaultValues[$field->name()]);
        }

        $this->form->addField($field);

        return $this;
    }

    /**
     * @param array $defaultValues
     * @return $this
     */
    public function setDefaultValues(array $defaultValues)
    {
        $this->defaultValues = $defaultValues;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param $form
     * @return $this
     */
    public function setForm($form)
    {
        $this->form = $form;

        return $this;
    }
}