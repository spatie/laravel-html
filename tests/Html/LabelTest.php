<?php

namespace Spatie\Html\Test\Html;

class LabelTest extends TestCase
{
    /** @test */
    public function it_can_create_a_label()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<label></label>',
            $this->html->label()
        );
    }

    /** @test */
    public function it_can_create_a_label_with_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<label>Hi</label>',
            $this->html->label('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_label_with_html_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<label><em>Hi</em></label>',
            $this->html->label('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_label_with_a_custom_for_attribute()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<label for="some_input_id">Hi</label>',
            $this->html->label('Hi', 'some_input_id')
        );
    }
}
