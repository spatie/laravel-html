<?php

namespace Spatie\Html\Test\Html;

class TextareaTest extends TestCase
{
    /** @test */
    public function it_can_create_a_textarea()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea></textarea>',
            $this->html->textarea()
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea id="description" name="description"></textarea>',
            $this->html->textarea('description')
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea id="description" name="description">Foo bar</textarea>',
            $this->html->textarea('description', 'Foo bar')
        );
    }
}
