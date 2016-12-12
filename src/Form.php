<?php

namespace Tiix\Form;

use Tiix\Form\Button\ButtonContract;
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
     * @var ButtonContract[]
     */
    private $buttons = [];

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
     * @param $name
     * @return FieldContract
     * @throws Exception
     */
    public function field($name)
    {
        if(!isset($this->fields[$name])) {
            throw new Exception(sprintf('Field [%s] does not exist', $name));
        }

        return $this->fields[$name];
    }

    /**
     * @return Field\FieldContract[]
     */
    public function fields()
    {
        return $this->fields;
    }

    /**
     * @param ButtonContract $action
     * @return $this
     * @throws Exception
     */
    public function addButton(ButtonContract $action)
    {
        if(isset($this->buttons[$action->name()])) {
            throw new Exception(sprintf('Button [%s] already exists', $action->name()));
        }

        $this->buttons[$action->name()] = $action;

        return $this;
    }

    /**
     * @return Button\ButtonContract[]
     */
    public function buttons()
    {
        return $this->buttons;
    }

    /**
     * @param $name
     * @return ButtonContract
     * @throws Exception
     */
    public function button($name)
    {
        if(!isset($this->buttons[$name])) {
            throw new Exception(sprintf('Button [%s] does not exist', $name));
        }

        return $this->buttons[$name];
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return $this->renderer->render($this);
    }
}