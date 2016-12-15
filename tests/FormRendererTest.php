<?php

class FormRendererTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_should_work()
    {
        $form = \Tiix\Form\Builder::createDefaultBuilder()->build(\Tiix\Form\Form::class, '/store')
            ->addField(new \Tiix\Form\Field\TextField('text'))
            ->addField(new \Tiix\Form\Field\NumberField('number'))
            ->addField(new \Tiix\Form\Field\HiddenField('hidden'))
            ->addField(new \Tiix\Form\Field\TextAreaField('textarea'))

            ->addButton(new \Tiix\Form\Button\Submit('submit'))
            ->getForm();

        $renderer = new \Tiix\Form\FormRenderer(new \Tiix\Form\SimpleTemplateEngine(), __DIR__ . '/../resources/views/simple');
        $renderer->render($form);

        $renderer = new \Tiix\Form\FormRenderer(new \Tiix\Form\SimpleTemplateEngine(), __DIR__ . '/../resources/views/bootstrap3');
        $renderer->render($form);
    }
}