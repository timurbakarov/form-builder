<?php

namespace Tiix\Form;

class Builder
{
    /**
     * @var FormRendererInterface
     */
    private $renderer;

    public function __construct(FormRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param Form $form
     * @return Form
     */
    public function build($formClassName, $action)
    {
        $form = new $formClassName($action, $this->renderer);

        return $form;
    }
}