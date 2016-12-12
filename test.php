<?php

require __DIR__ .'/vendor/autoload.php';

$builder = \Tiix\Form\Builder::createDefaultBuilder();

$form = $builder->build(\Tiix\Form\Form::class, '/store', ['name' => 'John Doe'])
    ->addField(new \Tiix\Form\Field\TextField('name'))
    ->addField(new \Tiix\Form\Field\NumberField('name1'))
    ->getForm()
;

$form->render();