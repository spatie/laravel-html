# Changelog

All notable changes to `laravel-html` will be documented in this file.

## 2.25.0 - 2020-03-02

- add Laravel 7 support

## 2.24.0 - 2019-09-04

- Added number input

## 2.23.0 - 2019-09-04

- Laravel 6 support
- Better handling for `0` values in inputs
- Add `range` for range inputs
- Format date and time values

## 2.22.1 - 2019-07-16

- Prevent password fields to be filled

## 2.22.0 - 2019-04-26
- Changed the `value` parameter in `data` to an optional parameter

## 2.21.0 - 2019-02-27
- Added Laravel 5.8 support
- Dropped PHP 7.0 support
- Dropped Laravel 5.4 support
- Dropped PHPUnit 6 support

## 2.20.1 - 2019-02-01

- use `Arr::` and `Str::` functions

## 2.20.0 - 2019-01-18
- Added `unless` method and magic `__call` handler (e.g. `$input->valueUnless(false, 5)`)
- Added `size` attribute method to `Input`
- Added `name` attribute method to `Button`
- Fixed checkbox value repopulation after request

## 2.19.9 - 2019-01-10
- Improve default of `tel` link

## 2.19.8 - 2018-09-04
- Add support for Laravel 5.7

## 2.19.7 - 2018-04-30
- Allow radio input check "0" value

## 2.19.6 - 2018-04-30
- Correctly prefill form array attributes from the model

## 2.19.5 - 2018-04-04
- Allow `null` children

## 2.19.4 - 2018-03-28
- Revert comparison function change in `2.19.2`

## 2.19.2 - 2018-03-26
- Fixed comparison function for selected options in `Select`

## 2.19.1 - 2018-03-23
- Fixed `Html::radio` auto-generated id's & checked behaviour

## 2.19.0 - 2018-03-09
- Changed `Input::require` to accept a boolean value

## 2.18.0 - 2018-03-02
- Added `I` element class and `Html::i` factory method

## 2.17.0 - 2018-02-28
- Added `Html::value` function that's a public method for `old`

## 2.16.0 - 2018-02-26
- Added `Img` element class and `Html::img` factory method

## 2.15.1 - 2018-02-26
- Removed `id` from CSRF fields

## 2.15.0 - 2018-02-23
- Added `Input::date` and `Input::time`

## 2.14.0 - 2018-02-22
- Added `Input::disabled`

## 2.13.1 - 2018-02-20
- Added `Form::novalidate`

## 2.12.1 - 2018-02-08
- Fixed Laravel 5.6 compatibility

## 2.12.0 - 2018-02-08
- Added Laravel 5.6 compatibility
- Fixed an issue with checkbox values

## 2.11.0 - 2018-02-02
- Add `readonly` method to input

## 2.10.3 - 2018-01-09
- Fix `__call` when using macros

## 2.10.2 - 2017-12-28
- `Htmlable` elements can now be used in the `html()` method
- Array notation is now implicitly converted to dot notation in `old` (e.g. `foo[1] -> foo.1`)

## 2.10.1 - 2017-12-18
- Fixed old values containing `0`

## 2.10.0 - 2017-11-08
- Added `required` method to `Select`

## 2.9.0 - 2017-10-20
- Added `required` method to `Textarea`

## 2.8.2 - 2017-10-13
- Fixed a bug with values that are a `"0"` string

## 2.8.1 - 2017-10-12
- Fixed a bug with values that are a `"0"` string

## 2.8.0 - 2017-10-12
- Added a magic `__call` method that responds to methods ending with `If`, so any method can be called with a condition as it's first argument. The method will only be applied if the condition is truthy.

## 2.7.0 - 2017-10-11
- Added `BaseElement::data` for data attributes

## 2.6.0 - 2017-10-11
- Added `BaseElement::setChildren` to replace all children
- Fixed a bug that didn't select options in optgroups when applying a value

## 2.5.0 - 2017-10-11
- Added `BaseElement::style` for setting the style attribute (with a string or an associative array)
- Added `Html::reset` for form reset buttons

## 2.4.1 - 2017-09-07
- Nothing changed, but `2.2.0` was accidentally tagged as `2.4.0`. This release contains the actual latest version at the time of writing.

## 2.3.0 - 2017-09-04
- Added `checked` and `unchecked` methods to `Input`

## 2.2.0 - 2017-08-29
- Added `Optgroup` element
- Added the ability to create optgroups in `Options` by passing an array of groups with options

## 2.1.0 - 2017-08-24
- Added `Html::file` and a `File` element for file inputs

## 2.0.2 - 2017-07-14
- Fixed an issue that stripped square brackets from element attributes

## 2.0.1 - 2017-06-28
- Fixed the `Html` facade

## 2.0.0 - 2017-06-13
- Minimum requirements have been reduced to PHP 7.0
- Added a `html()` helper function that returns an instance of `Html`
- Added `Macroable` to all elements and `Html`
- Loosened type hints in method signatures for flexibility
- Added `Html::multiselect` method
- Added `Select::multiple` method

## 1.5.0 - 2017-05-19
- Added `class` method to `Html`

## 1.4.0 - 2017-05-16
- Added a `placeholder` method to `Textarea`

## 1.3.1 - 2017-05-09
- Added an empty `value` to `Select::placeholder`

## 1.3.0 - 2017-05-08
- Added a `placeholder` method to `Select` for default empty values

## 1.2.0 - 2017-04-28
- Added a `Html` facade

## 1.1.1 - 2017-04-27
- Fixed an issue where html was escaped when you didn't want it to do that, like in buttons and links

## 1.1.0 - 2017-04-19
- Added `Html::radio`
- Fixed an issue that set the wrong `value` for a checkbox created with `Html::checkbox`
- Fixed a case sensitivity issue with the `Textarea` class

## 1.0.0 - 2017-03-31
- Initial release
