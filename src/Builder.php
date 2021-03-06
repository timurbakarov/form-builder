<?php

namespace Tiix\Form;

use Tiix\Form\Button\BaseButton;
use Tiix\Form\Button\ButtonContract;
use Tiix\Form\Extension\ExtensionInterface;
use Tiix\Form\Field\BaseField;
use Tiix\Form\Field\FieldContract;

class Builder
{
    /**
     * @var ExtensionInterface[]
     */
    protected $extensions = [];

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
     * @param ExtensionInterface $extension
     * @return $this
     */
    public function addExtension(ExtensionInterface $extension)
    {
        $this->extensions[] = $extension;

        return $this;
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

        if(method_exists($form, 'build')) {
            $form->build($builder);
        }

        foreach($this->extensions as $extension) {
            $extension->buildForm($builder, $form);
        }

        return $builder;
    }

    /**
     * @param FormRendererInterface $renderer
     * @return $this
     */
    public function setRenderer(FormRendererInterface $renderer)
    {
        $this->renderer = $renderer;

        return $this;
    }

    /**
     * @return FormRendererInterface
     */
    public function renderer()
    {
        return $this->renderer;
    }

    /**
     * @param BaseButton $action
     * @return $this
     */
    public function addButton(BaseButton $button)
    {
        $this->form->addButton($button);

        return $this;
    }

    /**
     * @param BaseField $field
     * @return $this
     */
    public function addField(BaseField $field)
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