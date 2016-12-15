<?php

class LabelableTraitTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_set_and_get_label()
    {
        $object = new TestLabelableTraitClass('name');

        $object->setLabel('Label');
        $this->assertEquals('Label', $object->label());
    }

    /** @test */
    public function it_should_return_label()
    {
        $field = new TestLabelableTraitClass('name');
        $field->setLabel('Label of name');

        $this->assertEquals('Label of name', $field->label());
    }

    /** @test */
    public function it_set_label_should_return_field()
    {
        $field = new TestLabelableTraitClass('name');

        $this->assertEquals($field, $field->setLabel('Label of name'));
    }

    /** @test */
    public function it_should_return_default_label()
    {
        $field = new TestLabelableTraitClass('name');

        $this->assertEquals('Name', $field->label());
    }
}

class TestLabelableTraitClass extends \Tiix\Form\Field\BaseField implements \Tiix\Form\Labelable
{
    use \Tiix\Form\LabelableTrait;

    /**
     * @return string
     */
    public function id()
    {
        return 'test';
    }
}