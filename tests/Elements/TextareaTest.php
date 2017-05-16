<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Textarea;
use Spatie\Html\Test\TestCase;

class TextareaTest extends TestCase
{
    /** @test */
    public function it_can_create_a_textarea()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea></textarea>',
            Textarea::create()
        );
    }

    /** @test */
    public function it_can_create_an_autofocused_textarea()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea autofocus></textarea>',
            Textarea::create()->autofocus()
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_a_placeholder()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea placeholder="Lorem ipsum"></textarea>',
            Textarea::create()->placeholder('Lorem ipsum')
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea name="text"></textarea>',
            Textarea::create()->name('text')
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea>My epic</textarea>',
            Textarea::create()->value('My epic')
        );
    }
}
