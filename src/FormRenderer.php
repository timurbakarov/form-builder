<?php

namespace Tiix\Form;

use Tiix\Form\Button\BaseButton;
use Tiix\Form\Field\BaseField;
use Tiix\Form\Field\InputField;
use Tiix\Form\Field\TextAreaField;

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

    /**
     * @var array
     */
    protected $views = [
        TextAreaField::class => 'textarea',
        Typeable::class => 'input',
    ];

    public function __construct(TemplateEngineInterface $templateEngine, $path)
    {
        $this->templateEngine = $templateEngine;
        $this->path = rtrim($path, '/') . '/';
    }

    /**
     * @return array
     */
    public function classesOptions()
    {
        return [];
    }

    /**
     * @return array
     */
    public function elementsOptions()
    {
        return [];
    }

    /**
     * @param Form $form
     * @return $this
     */
    protected function beforeRender(Form $form)
    {
        $elements = array_merge($form->fields(), $form->buttons());

        foreach($elements as $element) {
            foreach($this->classesOptions() as $className => $options) {
                if(is_a($element, $className)) {
                    foreach($options as $key => $value) {
                        $element->mergeOption($key, $value);
                    }
                }
            }
        }

        $elementsOptions = $this->elementsOptions();

        foreach($elements as $element) {
            if(isset($elementsOptions[$element->name()])) {
                foreach($elementsOptions[$element->name()] as $key => $value) {
                    $element->mergeOption($key, $value);
                }
            }
        }

        return $this;
    }

    /**
     * @param $view
     * @param array $data
     */
    public function render(Form $form)
    {
        if(method_exists($this, 'beforeRender')) {
            $this->beforeRender($form);
        }

        return $this->templateEngine->render($this->path . 'form', [
            'form' => $form,
            'renderer' => $this,
        ]);
    }

    /**
     * @param Form $form
     * @param BaseField $field
     * @return mixed
     */
    public function renderField(Form $form, BaseField $field)
    {
        return $this->templateEngine->render($this->path . 'field', [
            'form' => $form,
            'field' => $field,
            'renderer' => $this,
        ]);
    }

    /**
     * @param Form $form
     * @param BaseField $field
     * @return mixed
     */
    public function renderLabel(Form $form, BaseField $field)
    {
        if(! ($field instanceof Labelable)) {
            return '';
        }

        return $this->templateEngine->render($this->path . 'label', [
            'form' => $form,
            'field' => $field,
            'renderer' => $this,
        ]);
    }

    /**
     * @param Form $form
     * @param BaseField $field
     * @return mixed
     */
    public function renderInput(Form $form, BaseField $field)
    {
        $view = $this->getElementView($field);

        return $this->templateEngine->render($this->path . 'fields/' . $view, [
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
     * @param BaseButton $button
     * @return mixed
     */
    public function renderButton(Form $form, BaseButton $button)
    {
        return $this->templateEngine->render($this->path . 'buttons/' . $button->id(), [
            'form' => $form,
            'button' => $button,
            'renderer' => $this,
        ]);
    }

    /**
     * @param $field
     * @return mixed
     * @throws Exception
     */
    private function getElementView(Element $element)
    {
        foreach($this->views as $viewClass => $view) {
            if($element instanceof $viewClass) {
                return $view;
            }
        }

        throw new Exception('There is no view for element ' . get_class($element));
    }
}