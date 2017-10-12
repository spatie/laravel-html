<?php

namespace Spatie\Html\Test\Html;

class CheckboxTest extends TestCase
{
    /** @test */
    public function it_can_create_a_checkbox()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            $this->html->checkbox()
        );
    }

    /** @test */
    public function it_can_create_a_checkbox_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" name="my_checkbox" id="my_checkbox" value="1">',
            $this->html->checkbox('my_checkbox')
        );
    }

    /** @test */
    public function it_can_create_a_checked_checkbox_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="1">',
            $this->html->checkbox('my_checkbox', true)
        );
    }

    /** @test */
    public function it_can_create_a_checkbox_with_a_name_and_a_custom_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="foo">',
            $this->html->checkbox('my_checkbox', true, 'foo')
        );
    }

    /** @test */
    public function it_can_create_a_checkbox_with_a_name_and_a_zero_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="0">',
            $this->html->checkbox('my_checkbox', true, 0)
        );
    }
}
