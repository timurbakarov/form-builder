<?php

class BuilderTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_return_form()
    {
        $this->assertEquals(\Tiix\Form\Form::class, get_class($this->getBuilder()->build(\Tiix\Form\Form::class, '/store')->getForm()));
    }

    /** @test */
    public function it_adds_default_values()
    {
        $defaults = [
            'name' => 'John Doe',
        ];

        $form = $this->getBuilder()
            ->build(\Tiix\Form\Form::class, '/store', $defaults)
            ->addField(new \Tiix\Form\Field\TextField('name'))
            ->getForm()
        ;

        $this->assertEquals('John Doe', $form->field('name')->value());
    }

    /**
     * @return \Tiix\Form\Builder
     */
    private function getBuilder()
    {
        return new \Tiix\Form\Builder(new \Tiix\Form\FormRenderer(new \Tiix\Form\SimpleTemplateEngine(), __DIR__ .'/_data'));
    }
}