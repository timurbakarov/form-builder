<?php

class FieldTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_return_id()
    {
        $field = new TestNameField('name');

        $this->assertEquals('test-id', $field->id());
    }

    /** @test */
    public function it_should_return_name()
    {
        $field = new TestNameField('name');

        $this->assertEquals('name', $field->name());
    }

    /** @test */
    public function it_should_return_value_if_set()
    {
        $field = new TestNameField('name');
        $field->setValue('test-value');

        $this->assertEquals('test-value', $field->value());
    }

    /** @test */
    public function it_should_validate_data()
    {
        $field = new TestNameField('name');

        $this->assertTrue($field->isValid(['name' => 'value']));
        $this->assertFalse($field->isValid([['test' => 'value']]));
    }

    /** @test */
    public function it_should_process_data()
    {
        $field = new TestNameField('name');

        $this->assertEquals('value', $field->processRequestData(['name' => 'value']));
    }

    /** @test */
    public function it_should_return_label()
    {
        $field = new TestNameField('name');
        $field->setLabel('Label of name');

        $this->assertEquals('Label of name', $field->label());
    }

    /** @test */
    public function it_should_return_default_label()
    {
        $field = new TestNameField('name');

        $this->assertEquals('Name', $field->label());
    }
}

class TestNameField extends \Tiix\Form\Field\BaseField
{
    /**
     * @return string
     */
    public function id()
    {
        return 'test-id';
    }
}