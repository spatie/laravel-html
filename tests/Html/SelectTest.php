<?php

namespace Spatie\Html\Test\Html;

use Spatie\Html\Test\TestCase;

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
            '<select>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            $this->html->select($options)->render()
        );
    }
}
