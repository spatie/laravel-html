<?php

namespace Spatie\Html\Test\Html;

class MultiSelectTest extends TestCase
{
    /** @test */
    public function it_can_render_a_multiple_select_element()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple></select>',
            $this->html->multiselect()->render()
        );
    }

    /** @test */
    public function it_can_render_a_multiple_select_element_with_options()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
        ];

        $this->assertHtmlStringEqualsHtmlString(
            '<select name="select[]" id="select" multiple>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            $this->html->multiselect('select', $options)->render()
        );
    }

    /** @test */
    public function it_can_render_a_multiple_select_element_with_options_selected()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
            'value3' => 'text3',
        ];

        $this->assertHtmlStringEqualsHtmlString(
            '<select name="select[]" id="select" multiple>
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
            $this->html->multiselect('select', $options, ['value1', 'value3'])->render()
        );
    }
}
