<?php

class NumberFieldTest extends PHPUnit_Framework_TestCase
{
    public function test_it_should_return_type()
    {
        $field = new \Tiix\Form\Field\NumberField('name');

        $this->assertEquals('number', $field->type());
    }
}