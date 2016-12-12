<?php

require __DIR__ .'/vendor/autoload.php';

$builder = \Tiix\Form\Builder::createDefaultBuilder();
$builder->setRenderer(new \Tiix\Form\Renderer\Bootstrap3Renderer(new \Tiix\Form\SimpleTemplateEngine(), __DIR__ .'/resources/views/bootstrap3'));

$form = $builder->build(\Tiix\Form\Form::class, '/store', ['name' => 'John Doe'])
    ->addField(new \Tiix\Form\Field\TextField('name'))
    ->addField(new \Tiix\Form\Field\NumberField('name1'))

    ->addButton(new \Tiix\Form\Button\Submit('submit'))
    ->getForm()
;

$form->render();