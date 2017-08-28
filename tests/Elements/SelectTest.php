<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Test\TestCase;
use Spatie\Html\Elements\Select;

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

    /** @test */
    public function it_can_have_a_placeholder_option()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="" selected="selected">Placeholder</option>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::create()
                ->options(['value1' => 'text1', 'value2' => 'text2'])
                ->placeholder('Placeholder')
                ->render()
        );
    }

    /** @test */
    public function it_doesnt_select_the_placeholder_if_something_has_already_been_selected()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <option value="">Placeholder</option>
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
            </select>',
            Select::create()
                ->options(['value1' => 'text1', 'value2' => 'text2'])
                ->value('value1')
                ->placeholder('Placeholder')
                ->render()
        );
    }

    /** @test */
    public function it_can_have_a_multiple_option()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3">text3</option>
            </select>',
            Select::create()
                ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                ->multiple()
                ->render()
        );
    }

    /** @test */
    public function it_can_convert_multiple_select_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple" name="foo[]">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3">text3</option>
            </select>',
            Select::create()
                  ->name('foo')
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->multiple()
                  ->render()
        );
    }

    /** @test */
    public function it_can_have_multiple_values()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
            Select::create()
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->value(['value1', 'value3'])
                  ->multiple()
                  ->render()
        );
    }

    /** @test */
    public function it_can_have_one_multiple_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select multiple="multiple">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
            Select::create()
                  ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
                  ->value('value3')
                  ->multiple()
                  ->render()
        );
    }

    /** @test */
    public function it_can_have_an_optgroup()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<select>
                <optgroup label="Cats">
                    <option value="leopard">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel">Spaniel</option>
                </optgroup>
            </select>',
            Select::create()
                ->options([ 'Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel'], ])
                ->render()
        );
    }
}
