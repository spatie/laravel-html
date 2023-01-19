<?php

namespace Spatie\Html\Test\Html;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Mockery;
use PHPUnit\Framework\TestCase as FrameworkTestCase;
use Spatie\Html\Html;
use Spatie\Html\Test\Concerns\AssertsHtmlStrings;

abstract class TestCase extends FrameworkTestCase
{
    // use AssertsHtmlStrings;

    /** @var \Mockery\MockInterface */
    protected $request;

    /** @var array */
    protected $session = [];

    /** @var \Spatie\Html\Html */
    public $html;

    protected function setUp(): void
    {
        parent::setUp();

        $this->request = Mockery::mock(Request::class);

        $this->request
            ->shouldReceive('old')
            ->withNoArgs()
            ->andReturnUsing(function () {
                return $this->session;
            });

        $this->request
            ->shouldReceive('old')
            ->withAnyArgs()
            ->andReturnUsing(function ($key, $value = null) {
                return $this->session[$key] ?? $value;
            });

        $session = Mockery::mock(Session::class)
            ->shouldReceive('token')
            ->andReturn('abc');

        $this->request
            ->shouldReceive('session')
            ->andReturn($session->getMock());

        $this->html = new Html($this->request);
    }

    protected function withModel(array $model)
    {
        $this->html->model($model);

        return $this;
    }

    protected function withSession(array $session)
    {
        $this->session = $session;

        return $this;
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
