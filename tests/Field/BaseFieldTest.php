<?php

class BaseFieldTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_return_name_and_label()
    {
        $field = new SimpleField('name');

        $this->assertEquals('name', $field->name());
    }
}

class SimpleField extends \Tiix\Form\Field\BaseField
{
    /**
     * @return string
     */
    public function id()
    {
        return 'simple';
    }
}