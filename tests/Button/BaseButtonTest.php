<?php

class BaseButtonTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_return_name_and_label()
    {
        $button = new SimpleButton('submit');

        $this->assertEquals('simple', $button->id());
        $this->assertEquals('submit', $button->name());
        $this->assertEquals('Submit', $button->label());

        $button->setLabel('Go');
        $this->assertEquals('Go', $button->label());
    }
}

class SimpleButton extends \Tiix\Form\Button\BaseButton
{
    /**
     * @return string
     */
    public function id()
    {
        return 'simple';
    }
}