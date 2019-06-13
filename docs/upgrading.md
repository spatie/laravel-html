---
title: Upgrading
weight: 4
---

### From v1 to v2

Version 2 was created because the typehints in version 1 was holding the package back in some cases (like multiple select which requires an array of values instead of a string which was assumed).

Luckily, bumping the version number in `composer.json` and running `composer update` should be non-breaking. Here are some caveats to look out for:

- The package now ships with a `html()` function by default, which returns an instance of the `Html` builder class. If you've defined your own method, you'll need to remove it.
- Various type hints have been removed throughout the package, if you've extended a class to override it's methods, you'll need to update them accordingly (everything still behaves the same!)
