<?php

namespace Spatie\Html\Test\Html;

class SelectTest extends TestCase
{
    /** @test */
    public function it_can_render_a_select_element()
    {
        assertHtmlStringEqualsHtmlString(
            '<select></select>',
            $this->html->select()->render()
        );
    }

    /** @test */
    public function it_can_render_a_select_element_required()
    {
        assertHtmlStringEqualsHtmlString(
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

        assertHtmlStringEqualsHtmlString(
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

        assertHtmlStringEqualsHtmlString(
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

        assertHtmlStringEqualsHtmlString(
            '<select name="select" id="select">
                <option value="0">0</option>
                <option selected="selected" value="2">2</option>
                <option value="+2" selected="selected">+2</option>
            </select>',
            $this->html->select('select', $options, '+2')->render()
        );
    }
}
