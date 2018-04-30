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
            '<input type="radio" name="my_radio" id="my_radio_1" checked="checked" value="1">',
            $this->html->radio('my_radio', true, 1)
        );
    }

    /** @test */
    public function it_can_create_a_radio_button_with_a_name_and_a_zero_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio_0" checked="checked" value="0">',
            $this->html->radio('my_radio', true, 0)
        );
    }

    /** @test */
    public function it_can_create_multiple_radio_buttons_and_check_the_right_value()
    {
        $this->html->model(['color' => 'green']);

        $this->assertHtmlStringEqualsHtmlString(
            '<div>'.
                '<input type="radio" name="color" id="color_red" value="red">'.
                '<input type="radio" name="color" id="color_green" checked="checked" value="green">'.
                '<input type="radio" name="color" id="color_blue" value="blue">'.
            '</div>',
            $this->html->div([
                $this->html->radio('color', false, 'red'),
                $this->html->radio('color', false, 'green'),
                $this->html->radio('color', false, 'blue'),
            ])
        );
    }

    /** @test */
    public function it_can_create_multiple_radio_buttons_and_check_the_zero_value()
    {
        $this->html->model(['is_admin' => '0']);

        $this->assertHtmlStringEqualsHtmlString(
            '<div>'.
                '<input type="radio" name="is_admin" id="is_admin_1" value="1">'.
                '<input type="radio" name="is_admin" id="is_admin_0" checked="checked" value="0">'.
            '</div>',
            $this->html->div([
                $this->html->radio('is_admin', false, '1'),
                $this->html->radio('is_admin', false, '0'),
            ])
        );
    }
}
