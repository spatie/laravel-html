<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Select;
use Spatie\Html\Test\TestCase;

class SelectTest extends TestCase
{
    /** @test */
    public function it_can_render_an_empty_version_itself()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select></select>',
            Select::create()->render()
        );
    }

    /** @test */
    public function it_can_render_options()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
            </select>',
            Select::create()->options(['value1' => 'text1'])->render()
        );
    }

    /** @test */
    public function it_can_have_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="value1">text1</option>
                <option selected value="value2">text2</option>
            </select>',
            Select::create()
                ->options(['value1' => 'text1', 'value2' => 'text2'])
                ->value('value2')
                ->render()
        );
    }
}
