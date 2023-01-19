<?php

namespace Spatie\Html\Test\Html;

class MultiselectTest extends TestCase
{
    /** @test */
    public function it_can_create_a_multiselect()
    {
        $options = [
            'value1' => 'text1',
            'value2' => 'text2',
            'value3' => 'text3',
        ];

        assertHtmlStringEqualsHtmlString(
            '<select id="select" name="select[]" multiple="multiple">
                <option value="value1" selected>text1</option>
                <option value="value2" selected>text2</option>
                <option value="value3">text3</option>
            </select>',
            $this->html->multiselect('select', $options, ['value1', 'value2'])->render()
        );
    }
}
