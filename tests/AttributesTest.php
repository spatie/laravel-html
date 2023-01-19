<?php

use Spatie\Html\Attributes;

it('starts empty', function () {
    $attributes = new Attributes();

    expect($attributes)
        ->isEmpty()->toBeTrue()
        ->toArray()->toBeEmpty()
        ->render()->toBeEmpty();
});

it('accepts classes as strings', function () {
    $attributes = new Attributes();
    $attributes->addClass('foo bar');

    expect($attributes->toArray())->toHaveKey('class')
        ->and($attributes->toArray()['class'])->toEqual('foo bar');
});

it('accepts classes as an array', function () {
    $attributes = new Attributes();
    $attributes->addClass(['foo', 'bar']);

    expect($attributes->toArray())->toHaveKey('class')
        ->and($attributes->toArray()['class'])->toEqual('foo bar');
});

it('can add classes conditionally with an associative array', function () {
    $attributes = new Attributes();
    $attributes->addClass([
        'foo' => true,
        'bar' => false,
    ]);

    expect($attributes->toArray())->toHaveKey('class')
        ->and($attributes->toArray()['class'])->toEqual('foo');
});

it('can simultaneously add classes conditionally and non conditionally', function () {
    $attributes = new Attributes();
    $attributes->addClass([
        'foo' => true,
        'bar' => false,
        'baz',
    ]);

    expect($attributes->toArray())->toHaveKey('class')
        ->and($attributes->toArray()['class'])->toEqual('foo baz');
});

it('accepts attributes', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('href', '#');
    $attributes->setAttribute('class', 'foobar');

    expect($attributes->toArray())->toHaveKey('href')
        ->and($attributes->toArray()['href'])->toEqual('#')
        ->and($attributes->toArray())->toHaveKey('class')
        ->and($attributes->toArray()['class'])->toEqual('foobar');
});

it('accepts attributes without values', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('required');

    expect($attributes->toArray())->toHaveKey('required')
        ->and($attributes->toArray()['required'])->toBeNull();
});

it('can forget an attribute', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('href', '#');
    $attributes->forgetAttribute('href');

    expect($attributes->getAttribute('href'))->toBeNull();
});

it("can forget it's classes", function () {
    $attributes = new Attributes();
    $attributes->addClass('foo');
    $attributes->forgetAttribute('class');

    expect($attributes->getAttribute('class'))->toBeEmpty();
});

it('can get an attribute', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('foo', 'bar');

    expect($attributes->getAttribute('foo'))->toEqual('bar');
});

it('can get a class list', function () {
    $attributes = new Attributes();

    expect($attributes->getAttribute('class'))->toEqual('');

    $attributes->addClass(['foo', 'bar']);

    expect($attributes->getAttribute('class'))->toEqual('foo bar');
});

it("returns null if an attribute doesn't exist", function () {
    $attributes = new Attributes();

    expect($attributes->getAttribute('foo'))->toBeNull();
});

it("can return a fallback if an attribute doesn't exist", function () {
    $attributes = new Attributes();

    expect($attributes->getAttribute('foo', 'bar'))->toEqual('bar');
});

it('accepts multiple attributes', function () {
    $attributes = new Attributes();
    $attributes->setAttributes([
        'name' => 'email',
        'class' => 'foobar',
        'required',
    ]);

    expect($attributes->toArray())->toHaveKeys(['name', 'required'])
        ->and($attributes->toArray()['name'])->toEqual('email')
        ->and($attributes->toArray()['required'])->toBeEmpty();
});

it('can be rendered when empty', function () {
    $attributes = new Attributes();

    expect($attributes->render())->toEqual('');
});

it('can be rendered with an attribute', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('foo', 'bar');

    expect($attributes->render())->toEqual('foo="bar"');
});

it('can be rendered with multiple attributes', function () {
    $attributes = new Attributes();
    $attributes->setAttributes(['foo' => 'bar', 'baz' => 'qux']);

    expect($attributes->render())->toEqual('foo="bar" baz="qux"');
});

it('can be rendered with a falsish attribute', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('foo', '0');

    expect($attributes->render())->toEqual('foo="0"');
});

it('can escape values when rendered', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('foo', '<bar baz=""></bar>');

    expect($attributes->render())->toEqual('foo="&lt;bar baz=&quot;&quot;&gt;&lt;/bar&gt;"');
});

it('can render square brackets', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('names[]', 'Sebastian');

    expect($attributes->render())->toEqual('names[]="Sebastian"');
});

it('can determine wether an attribute exists', function () {
    $attributes = new Attributes();
    $attributes->setAttribute('foo', 'bar');

    expect($attributes)
        ->hasAttribute('foo')->toBeTrue()
        ->hasAttribute('bar')->toBeFalse();
});
