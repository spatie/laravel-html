<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Img;
use Spatie\Html\Test\TestCase;

class ImgTest extends TestCase
{
    /** @test */
    public function it_can_create_an_img()
    {
        assertHtmlStringEqualsHtmlString(
            '<img>',
            Img::create()
        );
    }

    /** @test */
    public function it_can_create_an_img_with_an_alt_attribute()
    {
        assertHtmlStringEqualsHtmlString(
            '<img alt="Sleepy koala">',
            Img::create()->alt('Sleepy koala')
        );
    }

    /** @test */
    public function it_can_create_an_img_with_a_src_attribute()
    {
        assertHtmlStringEqualsHtmlString(
            '<img src="sleepy-koala.jpg">',
            Img::create()->src('sleepy-koala.jpg')
        );
    }
}
