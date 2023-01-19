<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\P;
use Spatie\Html\Test\TestCase;

class PTest extends TestCase
{
    /** @test */
    public function it_can_create_an_p_element()
    {
        assertHtmlStringEqualsHtmlString(
            '<p></p>',
            P::create()
        );
    }
}
