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
    public function it_can_create_a_required_textarea()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea required>My epic</textarea>',
            Textarea::create()->value('My epic')->required()
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

    /** @test */
    public function it_can_create_a_textarea_that_is_required_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea required>My epic</textarea>',
            Textarea::create()->value('My epic')->required(true)
        );
    }

    /** @test */
    public function it_wont_create_a_textarea_that_is_required_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea>My epic</textarea>',
            Textarea::create()->value('My epic')->required(false)
        );
    }

    /** @test */
    public function it_can_create_a_disabled_textarea()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea disabled>My epic</textarea>',
            Textarea::create()->value('My epic')->disabled()
        );
    }

    /** @test */
    public function it_can_create_a_textarea_that_is_disabled_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea disabled>My epic</textarea>',
            Textarea::create()->value('My epic')->disabled(true)
        );
    }

    /** @test */
    public function it_wont_create_a_textarea_that_is_disabled_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea>My epic</textarea>',
            Textarea::create()->value('My epic')->disabled(false)
        );
    }

    /** @test */
    public function it_can_create_a_readonly_textarea()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea readonly>My epic</textarea>',
            Textarea::create()->value('My epic')->isReadonly()
        );
    }

    /** @test */
    public function it_can_create_a_textarea_that_is_readonly_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea readonly>My epic</textarea>',
            Textarea::create()->value('My epic')->isReadonly(true)
        );
    }

    /** @test */
    public function it_wont_create_a_textarea_that_is_readonly_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea>My epic</textarea>',
            Textarea::create()->value('My epic')->isReadonly(false)
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_maxlength()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea maxlength="25">My epic</textarea>',
            Textarea::create()->value('My epic')->maxlength(25)
        );
    }

    /** @test */
    public function it_can_create_a_textarea_with_minlength()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<textarea minlength="25">My epic</textarea>',
            Textarea::create()->value('My epic')->minlength(25)
        );
    }
}
