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

    /** @test */
    public function it_should_add_buttons()
    {
        $button = new TestButton('submit');

        $form = $this->getBuilder()
            ->build(\Tiix\Form\Form::class, '/store')
            ->addButton($button)
            ->getForm()
        ;

        $this->assertEquals(1, count($form->buttons()));
        $this->assertEquals($button, $form->button('submit'));
    }

    /** @test */
    public function it_should_throw_exception_if_button_exists()
    {
        $this->setExpectedException(\Tiix\Form\Exception::class, 'Button [submit] already exists');

        $this->getBuilder()
            ->build(\Tiix\Form\Form::class, '/store')
            ->addButton(new TestButton('submit'))
            ->addButton(new TestButton('submit'))
            ->getForm()
        ;
    }

    /** @test */
    public function it_should_create_standalone_form()
    {
        $form = $this->getBuilder()
            ->build(StandaloneTestForm::class, '/store')
            ->getForm()
        ;

        $this->assertInstanceOf(StandaloneTestForm::class, $form);
        $this->assertEquals('name', $form->field('name')->name());
    }

    /**
     * @return \Tiix\Form\Builder
     */
    private function getBuilder()
    {
        return new \Tiix\Form\Builder(new \Tiix\Form\FormRenderer(new \Tiix\Form\SimpleTemplateEngine(), __DIR__ .'/_data'));
    }
}

class StandaloneTestForm extends \Tiix\Form\Form
{
    /**
     * @param \Tiix\Form\Builder $builder
     * @return $this
     */
    public function build(\Tiix\Form\Builder $builder)
    {
        $builder->addField(new \Tiix\Form\Field\TextField('name'));

        return $this;
    }
}

class TestButton extends \Tiix\Form\Button\BaseButton
{
    /**
     * @return string
     */
    public function id()
    {
        return 'submit';
    }
}