<?php

namespace Spatie\Html\Test\Html;

class OldTest extends TestCase
{
    /** @test */
    public function it_returns_a_session_value_if_its_available_in_the_session()
    {
        $this
            ->withSession(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" value="Sebastian">',
                $this->html->text('name')
            );
    }

    /** @test */
    public function it_returns_a_model_value_if_its_available_in_the_model()
    {
        $this
            ->withModel(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" value="Sebastian">',
                $this->html->text('name')
            );
    }

    /** @test */
    public function it_returns_a_session_value_if_its_available_in_the_model_and_the_session()
    {
        $this
            ->withModel(['name' => 'Freek'])
            ->withSession(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" value="Sebastian">',
                $this->html->text('name')
            );
    }
}
