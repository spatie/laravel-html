<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Optgroup;
use Spatie\Html\Test\TestCase;

class OptgroupTest extends TestCase
{
    /** @test */
    public function it_can_create_an_optgroup()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<optgroup></optgroup>',
            Optgroup::create()
        );
    }

    public function it_can_create_an_element_with_a_label()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<optgroup label="Cats"></optgroup>',
            Optgroup::create()->label('Cats')
        );
    }
}
