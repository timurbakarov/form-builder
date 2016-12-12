<?php

class TextFieldTest extends PHPUnit_Framework_TestCase
{
    public function test_it_should_return_type()
    {
        $field = new \Tiix\Form\Field\TextField('name');

        $this->assertEquals('text', $field->type());
    }
}