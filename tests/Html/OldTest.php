<?php

namespace Spatie\Html\Test\Html;

use Illuminate\Support\Arr;

class OldTest extends TestCase
{
    /** @test */
    public function it_returns_a_session_value_if_its_available_in_the_session()
    {
        $this
            ->withSession(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" id="name" value="Sebastian">',
                $this->html->text('name')
            );

        $this
            ->withSession(['number' => 0])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="number" name="number" id="number" value="0">',
                $this->html->input('number', 'number')
            );
    }

    /** @test */
    public function it_returns_a_model_value_if_its_available_in_the_model()
    {
        $this
            ->withModel(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" id="name" value="Sebastian">',
                $this->html->text('name')
            );

        $this
            ->withModel(['email' => 'sebastian@spatie.be'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="email" name="email" id="email" value="sebastian@spatie.be">',
                $this->html->email('email')
            );

        $this
            ->withModel(['number' => 0])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="number" name="number" id="number" value="0">',
                $this->html->input('number', 'number')
            );
    }

    /** @test */
    public function it_returns_a_session_value_if_its_available_in_the_model_and_the_session()
    {
        $this
            ->withModel(['name' => 'Freek'])
            ->withSession(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" id="name" value="Sebastian">',
                $this->html->text('name')
            );
    }

    /** @test */
    public function it_returns_a_session_value_from_a_name_with_an_array()
    {
        $this
            ->withSession(Arr::dot(['name' => [1 => ['a' => 'Sebastian']]]))
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name[1][a]" id="name[1][a]" value="Sebastian">',
                $this->html->text('name[1][a]')
            );
    }

    /** @test */
    public function it_returns_a_model_value_from_a_name_with_an_array_if_its_available_in_the_model()
    {
        $this
            ->withModel(['name' => ['first_name' => 'Sebastian']])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name[first_name]" id="name[first_name]" value="Sebastian">',
                $this->html->text('name[first_name]')
            );

        $this
            ->withModel(['relation' => ['name' => ['first_name' => 'Sebastian']]])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="relation[name][first_name]" id="relation[name][first_name]" value="Sebastian">',
                $this->html->text('relation[name][first_name]')
            );

        $this
            ->withModel(['contact' => ['email' => 'sebastian@spatie.be']])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="email" name="contact[email]" id="contact[email]" value="sebastian@spatie.be">',
                $this->html->email('contact[email]')
            );

        $this
            ->withModel(['relation' => ['contact' => ['email' => 'sebastian@spatie.be']]])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="email" name="relation[contact][email]" id="relation[contact][email]" value="sebastian@spatie.be">',
                $this->html->email('relation[contact][email]')
            );

        $this
            ->withModel(['order' => ['number' => 0]])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="number" name="order[number]" id="order[number]" value="0">',
                $this->html->input('number', 'order[number]')
            );

        $this
            ->withModel(['relation' => ['order' => ['number' => 0]]])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="number" name="relation[order][number]" id="relation[order][number]" value="0">',
                $this->html->input('number', 'relation[order][number]')
            );

        $this
            ->withModel(['name' => ['option_1' => '1']])
            ->assertHtmlStringEqualsHtmlString(
                '<div>'.
                    '<input type="checkbox" name="name[option_1]" id="name[option_1]" value="1" checked="checked">'.
                    '<input type="checkbox" name="name[option_2]" id="name[option_2]" value="1">'.
                '</div>',
                $this->html->div([
                    $this->html->checkbox('name[option_1]'),
                    $this->html->checkbox('name[option_2]'),
                ])
            );
    }

    /** @test */
    public function it_returns_a_session_value_from_a_name_with_an_array_if_its_available_in_the_model_and_the_session()
    {
        $this
            ->withModel(['relation' => ['name' => ['first_name' => 'Freek']]])
            ->withSession(Arr::dot(['relation' => ['name' => ['first_name' => 'Sebastian']]]))
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="relation[name][first_name]" id="relation[name][first_name]" value="Sebastian">',
                $this->html->text('relation[name][first_name]')
            );

        $this
            ->withModel(['name' => ['option_1' => '1']])
            ->withSession(Arr::dot(['name' => ['option_2' => '1']]))
            ->assertHtmlStringEqualsHtmlString(
                '<div>'.
                    '<input type="checkbox" name="name[option_1]" id="name[option_1]" value="1">'.
                    '<input type="checkbox" name="name[option_2]" id="name[option_2]" value="1" checked="checked">'.
                '</div>',
                $this->html->div([
                    $this->html->checkbox('name[option_1]'),
                    $this->html->checkbox('name[option_2]'),
                ])
            );
    }
}
