<?php

class TextAreaFieldTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_should_be_initialized()
    {
        $field = new \Tiix\Form\Field\TextAreaField('body');

        $this->assertEquals('textarea', $field->id());
    }
}