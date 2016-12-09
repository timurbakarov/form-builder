<?php

namespace Tiix\Form;

interface TemplateEngineInterface
{
    /**
     * @param $view
     * @param array $data
     * @return mixed
     */
    public function render($view, array $data = []);
}