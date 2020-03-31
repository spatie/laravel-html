<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Form;
use Spatie\Html\Test\TestCase;

class FormTest extends TestCase
{
    /** @test */
    public function it_can_create_a_form()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form></form>',
            Form::create()
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_custom_action()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form action="/submit"></form>',
            Form::create()->action('/submit')
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_custom_method()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="POST"></form>',
            Form::create()->method('POST')
        );
    }

    /** @test */
    public function it_can_create_a_form_that_accepts_files()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data"></form>',
            Form::create()->acceptsFiles()
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_novalidate_attribute()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data" novalidate=""></form>',
            Form::create()->novalidate()->acceptsFiles()
        );
    }

    /** @test */
    public function it_can_create_a_form_that_has_novalidate_when_passing_true()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data" novalidate=""></form>',
            Form::create()->novalidate(true)->acceptsFiles()
        );
    }

    /** @test */
    public function it_wont_create_a_form_that_has_novalidate_when_passing_false()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form enctype="multipart/form-data"></form>',
            Form::create()->novalidate(false)->acceptsFiles()
        );
    }
}
