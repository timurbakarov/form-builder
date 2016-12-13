<?php

class ExtensionTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_add_field()
    {
        $builder = \Tiix\Form\Builder::createDefaultBuilder()
            ->addExtension(new CsrfTestExtension())
        ;

        $form = $builder->build(\Tiix\Form\Form::class, '/store')
            ->getForm();

        $this->assertEquals('csrf', $form->field('csrf')->name());
    }
}

class CsrfTestExtension implements \Tiix\Form\Extension\ExtensionInterface
{
    /**
     * @param \Tiix\Form\Builder $builder
     * @param \Tiix\Form\Form $form
     * @return mixed
     */
    public function buildForm(\Tiix\Form\Builder $builder, \Tiix\Form\Form $form)
    {
        $builder->addField(new \Tiix\Form\Field\TextField('csrf'));
    }
}