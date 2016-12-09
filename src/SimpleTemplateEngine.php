<?php

namespace Tiix\Form;

class SimpleTemplateEngine implements TemplateEngineInterface
{
    /**
     * @param $view
     * @param array $data
     * @return mixed
     */
    public function render($view, array $data = [])
    {
        extract($data);

        include $view . '.php';
    }
}