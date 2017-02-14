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
    public function it_can_render_a_select_element_with_options()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
        ];

        $this->assertHtmlStringEqualsHtmlString(
            '<select fieldName="select" id="select">
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
            '<select fieldName="select" id="select">
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
            </select>',
            $this->html->select('select', $options, 'value1')->render()
        );
    }
}
