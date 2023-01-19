<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Optgroup;
use Spatie\Html\Test\TestCase;

class OptgroupTest extends TestCase
{
    /** @test */
    public function it_can_create_an_optgroup()
    {
        assertHtmlStringEqualsHtmlString(
            '<optgroup></optgroup>',
            Optgroup::create()
        );
    }

    /** @test */
    public function it_can_create_an_element_with_a_label()
    {
        assertHtmlStringEqualsHtmlString(
            '<optgroup label="Cats"></optgroup>',
            Optgroup::create()->label('Cats')
        );
    }

    /** @test */
    public function it_can_disable_an_optgroup()
    {
        assertHtmlStringEqualsHtmlString(
            '<optgroup disabled></optgroup>',
            Optgroup::create()->disabled()
        );
    }
}
