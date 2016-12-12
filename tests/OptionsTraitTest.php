<?php

class OptionsTraitTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_set_options()
    {
        $field = new DummyClass('name');

        $field->setOptions(['class' => 'test']);
        $this->assertEquals(['class' => 'test'], $field->options());

        $field->setOption('title','Title');
        $this->assertEquals('Title', $field->option('title'));
    }

    /** @test */
    public function it_should_merge_options()
    {
        $field = new DummyClass('name');
        $field->setOptions(['class' => 'test']);


        $field->mergeOptions(['title' => 'Test']);
        $this->assertEquals(['class' => 'test', 'title' => 'Test'], $field->options());

        $field->mergeOption('class', 'dummy');
        $this->assertEquals('test dummy', $field->option('class'));
    }

    /** @test */
    public function it_should_return_options_string()
    {
        $field = new DummyClass('name');
        $field->setOptions(['class' => 'form', 'title' => 'Form']);

        $this->assertEquals('class="form" title="Form"', $field->optionsToString());
    }
}

class DummyClass
{
    use \Tiix\Form\OptionsTrait;
}