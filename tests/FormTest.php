<?php

use Tiix\Form\Field\FieldContract;

class FormTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Tiix\Form\Form
     */
    public $form;

    public function setUp()
    {
        $this->form = new Tiix\Form\Form('/blog/store', new \Tiix\Form\FormRenderer(new \Tiix\Form\SimpleTemplateEngine(), ''));
    }

    /** @test */
    public function it_tteturn_form_action1()
    {
        $this->assertEquals('/blog/store', $this->form->action());
    }

    /** @test */
    public function it_adds_field()
    {
        $this->assertEquals($this->form, $this->form->addField(new TestField('name')));
        $this->assertEquals(1, count($this->form->fields()));

        $this->assertEquals($this->form, $this->form->addField(new TestField('content')));
        $this->assertEquals(2, count($this->form->fields()));
    }

    /** @test */
    public function it_throws_exception_if_name_already_exists()
    {
        $this->setExpectedException(\Tiix\Form\Exception::class, "Name [name] already exists");

        $this->assertEquals($this->form, $this->form->addField(new TestField('name')));
        $this->assertEquals(1, count($this->form->fields()));

        $this->assertEquals($this->form, $this->form->addField(new TestField('name')));
        $this->assertEquals(1, count($this->form->fields()));
    }

    /** @test */
    public function it_returns_data()
    {
        $this->form->addField(new TestField('name'));
        $this->assertEquals(['name' => 'Test'], $this->form->processRequestData(['name' => 'Test']));

        $this->assertEquals(['name' => 'Test'], $this->form->processRequestData(['name' => 'Test', 'invalid_data' => 'value']));
    }
}

class TestField extends \Tiix\Form\Field\BaseField
{
    /**
     * @return string
     */
    public function id()
    {
        return 'test';
    }
}