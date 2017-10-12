<?php

namespace Spatie\Html\Test\Html;

class RadioTest extends TestCase
{
    /** @test */
    public function it_can_create_a_radio_button()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="radio">',
            $this->html->radio()
        );
    }

    /** @test */
    public function it_can_create_a_radio_button_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio">',
            $this->html->radio('my_radio')
        );
    }

    /** @test */
    public function it_can_create_a_checked_radio_button_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio" checked="checked">',
            $this->html->radio('my_radio', true)
        );
    }

    /** @test */
    public function it_can_create_a_radio_button_with_a_name_and_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio" checked="checked" value="1">',
            $this->html->radio('my_radio', true, 1)
        );
    }

    /** @test */
    public function it_can_create_a_radio_button_with_a_name_and_a_zero_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio" checked="checked" value="0">',
            $this->html->radio('my_radio', true, 0)
        );
    }
}
