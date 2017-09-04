<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Input;
use Spatie\Html\Test\TestCase;

class InputTest extends TestCase
{
    /** @test */
    public function it_can_create_an_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input>',
            Input::create()
        );
    }

    /** @test */
    public function it_can_check_an_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" checked="checked">',
            Input::create()->type('checkbox')->checked(true)
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" checked="checked">',
            Input::create()->type('checkbox')->checked()
        );
    }

    /** @test */
    public function it_can_uncheck_an_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            Input::create()->type('checkbox')->checked()->checked(false)
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            Input::create()->type('checkbox')->checked()->unchecked()
        );
    }
}
