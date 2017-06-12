# Changelog

All notable changes to `laravel-html` will be documented in this file.

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
