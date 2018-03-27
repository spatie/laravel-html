<?php

namespace Spatie\Html\Test\Html;

class SelectTest extends TestCase
{
    /** @test */
    public function it_can_render_a_select_element()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select></select>',
            $this->html->select()->render()
        );
    }

    /** @test */
    public function it_can_render_a_select_element_required()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select required></select>',
            $this->html->select()->required()->render()
        );
    }

    /** @test */
    public function it_can_render_a_select_element_with_options()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
        ];

        $this->assertHtmlStringEqualsHtmlString(
            '<select name="select" id="select">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            $this->html->select('select', $options)->render()
        );
    }

    /** @test */
    public function it_can_render_a_select_element_with_options_with_a_selected_value()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
        ];

        $this->assertHtmlStringEqualsHtmlString(
            '<select name="select" id="select">
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
            </select>',
            $this->html->select('select', $options, 'value1')->render()
        );
    }

    /** @test */
    public function it_can_render_a_select_element_with_options_with_a_selected_value_when_the_values_are_similar()
    {
        $options = [
            '0' => '0',
            '2' => '2',
            '+2' => '+2',
        ];

        $this->assertHtmlStringEqualsHtmlString(
            '<select name="select" id="select">
                <option value="0">0</option>
                <option value="2">2</option>
                <option value="+2" selected="selected">+2</option>
            </select>',
            $this->html->select('select', $options, '+2')->render()
        );
    }

    /** @test */
    public function it_considers_empty_values_as_null_when_selecting_an_active_value()
    {
        $this->html->modelForm(['select' => null]);

        $options = [
            'A' => 'A',
            'B' => 'B',
        ];

        $this->assertHtmlStringEqualsHtmlString(
            '<select name="select" id="select">
                <option value="" selected="selected">-- Choose one --</option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select>',
            $this->html->select('select', $options)->placeholder('-- Choose one --')->render()
        );
    }
}
