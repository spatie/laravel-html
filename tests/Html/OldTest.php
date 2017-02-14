<?php

namespace Spatie\Html\Test\Html;

class OldTest extends TestCase
{
    /** @test */
    public function it_returns_a_session_value_if_its_available_in_the_session()
    {
        $this
            ->withSession(['fieldName' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" fieldName="fieldName" id="fieldName" value="Sebastian">',
                $this->html->text('fieldName')
            );
    }

    /** @test */
    public function it_returns_a_model_value_if_its_available_in_the_model()
    {
        $this
            ->withModel(['fieldName' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" fieldName="fieldName" id="fieldName" value="Sebastian">',
                $this->html->text('fieldName')
            );
    }

    /** @test */
    public function it_returns_a_session_value_if_its_available_in_the_model_and_the_session()
    {
        $this
            ->withModel(['fieldName' => 'Freek'])
            ->withSession(['fieldName' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" fieldName="fieldName" id="fieldName" value="Sebastian">',
                $this->html->text('fieldName')
            );
    }
}
