<?php

namespace Spatie\Html\Test\Html;

use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Html\Html;
use Spatie\Html\HtmlServiceProvider;
use Spatie\Html\Test\Concerns\AssertsHtmlStrings;

abstract class TestCase extends Orchestra
{
    use AssertsHtmlStrings;

    /** @var \Spatie\Html\Html $html */
    protected $html;

    public function setUp()
    {
        parent::setUp();

        $this->html = $this->app->make(Html::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            HtmlServiceProvider::class,
        ];
    }
}
