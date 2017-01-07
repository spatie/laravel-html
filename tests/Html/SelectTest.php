<?php

namespace Spatie\Html\Test\Html;

use Spatie\Html\Html;
use Spatie\Html\Test\TestCase;

class SelectTest extends TestCase
{
    /** @test */
    public function it_can_render_a_select_element()
    {
        $this->assertSameHtml('<select></select>',(string)Html::select());
    }

    /** @test */
    public function it_can_render_a_select_element_with_options()
    {
        $options = [
            'option1' => 'value1',
            'option2' => 'value2',
        ];

        $this->assertSameHtml('
        <select>
            <option value="option1">value1</option>
            <option value="option2">value2</option>
        </select>',
        (string)Html::select($options));
    }
}