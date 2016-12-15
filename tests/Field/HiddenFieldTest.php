<?php

use Tiix\Form\Field\HiddenField;

class HiddenFieldTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_should_return_type()
    {
        $field = new HiddenField('_token');

        $this->assertEquals('hidden', $field->type());
    }
}