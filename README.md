# Painless html generation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-html.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-html)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/spatie/laravel-html/master.svg?style=flat-square)](https://travis-ci.org/spatie/laravel-html)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/143f42ef-2e74-42f0-87db-90403f253c85.svg?style=flat-square)](https://insight.sensiolabs.com/projects/143f42ef-2e74-42f0-87db-90403f253c85)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie/laravel-html.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie/laravel-html)
[![StyleCI](https://styleci.io/repos/78114062/shield?branch=master)](https://styleci.io/repos/78114062)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-html.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-html)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Postcardware

You're free to use this package (it's [MIT-licensed](LICENSE.md)), but if it makes it to your production environment we highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.

Our address is: Spatie, Samberstraat 69D, 2060 Antwerp, Belgium.

The best postcards will get published on the open source page on our website.

## Installation

You can install the package via composer:

``` bash
composer require spatie/laravel-html
```

## Usage

### Concepts

Elements—classes under the `Spatie\Html\Elements` namespace—are generally created via a `Spatie\Html\Html` builder instance.

```php
$html = app(Html::class);

$html->span()->text('Hello world!');
```

Element attributes and contents are modified via with fluent methods which return a new instance. This means element instances are immutable.

```php
$icon = $html->span()->class('fa');

$icon->class('fa-eye'); // '<span class="fa fa-eye"></span>'
$icon->class('fa-eye-slash'); // '<span class="fa fa-eye-slash"></span>'
```

Element classes don't have any knowledge of the outside world. Any coupling to other concepts, like requests and sessions, should happen in the builder class, not on the element classes.

By convention, we assume that builder methods will modify values to our advantage (like pulling old values from the session on a failed form request), and element methods will be deterministic.

```php
// This will try to resolve an initial value, and fall back to 'hello@example.com'
$email = $html->email('email', 'hello@example.com');

// This will always have 'hello@example.com' as it's value
$email = $html->email('email')->value('hello@example.com');
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

- [Sebastian De Deyne](https://github.com/sebastiandedeyne)
- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## About Spatie
Spatie is a webdesign agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
