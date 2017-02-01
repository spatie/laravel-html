<?php

namespace Spatie\Html\Test\Elements;

use PHPUnit_Framework_TestCase;
use Spatie\Html\Test\Concerns\AssertsHtmlStrings;

abstract class TestCase extends PHPUnit_Framework_TestCase
{
    use AssertsHtmlStrings;
}
