<?php

require __DIR__ .'/vendor/autoload.php';

$builder = new \Tiix\Form\Builder(new \Tiix\Form\FormRenderer(new \Tiix\Form\SimpleTemplateEngine(), __DIR__ . '/resources/views/'));

$form = $builder->build(\Tiix\Form\Form::class, '/store');
$form->addField(new \Tiix\Form\Field\TextField('name'));

$form->render();