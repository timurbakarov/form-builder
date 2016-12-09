<?php

namespace Tiix\Form;

use Tiix\Form\Field\FieldContract;

class Form
{
    /**
     * @var
     */
    private $action;

    /**
     * @var FieldContract[]
     */
    private $fields = [];

    /**
     * @var FormRendererInterface
     */
    private $renderer;

    /**
     * Form constructor.
     *
     * @param $action
     */
    public function __construct($action, FormRendererInterface $renderer)
    {
        $this->action = $action;
        $this->renderer = $renderer;
    }

    /**
     * @return mixed
     */
    public function action()
    {
        return $this->action;
    }

    /**
     * @param array $data
     * @return array
     */
    public function processRequestData(array $data)
    {
        $responseData = [];

        foreach($this->fields() as $field) {
            if(!$field->isValid($data)) {
                continue;
            }

            if($result = $field->processRequestData($data)) {
                $responseData[$field->name()] = $result;
            }
        }

        return $responseData;
    }

    /**
     * @return $this
     */
    public function addField(FieldContract $field)
    {
        if(isset($this->fields[$field->name()])) {
            throw new Exception(sprintf('Name [%s] already exists', $field->name()));
        }

        $this->fields[$field->name()] = $field;

        return $this;
    }

    /**
     * @return Field\FieldContract[]
     */
    public function fields()
    {
        return $this->fields;
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return $this->renderer->render($this);
    }

    /**
     * @param FieldContract $field
     * @return mixed
     */
    public function renderField(FieldContract $field)
    {
        return $this->renderer->renderField($this, $field);
    }
}