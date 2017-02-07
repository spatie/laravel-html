<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Legend;
use Spatie\Html\Test\TestCase;

class LegendTest extends TestCase
{
    /** @test */
    public function it_can_create_a_legend()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<legend></legend>',
            Legend::create()
        );
    }
}
