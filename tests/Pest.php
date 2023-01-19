<?php

use function PHPUnit\Framework\assertEqualsCanonicalizing;

uses(Spatie\Html\Test\Html\TestCase::class)->in('Html', 'Elements');

// Functions

/**
 * @param string $expectedHtml
 * @param \Illuminate\Contracts\Support\Htmlable|string $actualHtml
 */
function assertHtmlStringEqualsHtmlString($expectedHtml, $actualHtml): void
{
    assertEqualsCanonicalizing(
        convertToDomDocument($expectedHtml),
        convertToDomDocument($actualHtml),
        '',
        0.0,
        10
    );
}

/**
 * @param string $expectedHtml
 * @param \Illuminate\Contracts\Support\Htmlable|string $actualHtml
 */
function convertToDomDocument($html): DOMDocument
{
    $html = preg_replace('/>\s+</', '><', $html);

    $domDocument = new DOMDocument();
    $domDocument->loadHTML($html);
    $domDocument->preserveWhiteSpace = false;

    return $domDocument;
}
