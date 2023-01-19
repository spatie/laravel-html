<?php

it('can render a class attribute with classes based on conditions', function () {
    $classes = [
        'foo' => true,
        'bar' => false,
        'baz',
    ];

    expect($this->html->class($classes))->toEqual('class="foo baz"');
});

it('can render a class attribute from a string', function () {
    expect($this->html->class('foo'))->toEqual('class="foo"')
        ->and($this->html->class('foo foo'))->toEqual('class="foo"');
});

it('can render a class attribute from a collection', function () {
    $classes = collect([
        'foo' => true,
        'bar' => false,
    ]);

    expect($this->html->class($classes))->toEqual('class="foo"');
});
