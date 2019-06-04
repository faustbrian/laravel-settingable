# Laravel Settingable

[![Build Status](https://img.shields.io/travis/artisanry/Settingable/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Settingable)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/settingable.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Settingable.svg?style=flat-square)](https://github.com/artisanry/Settingable/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Settingable.svg?style=flat-square)](https://packagist.org/packages/artisanry/Settingable)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/settingable
```

## Usage

Within your controllers, before you perform a redirect...

``` php
<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Settingable;
}
```

```php
// This will be stored in the "default" collection
$user->settings()->all();
$user->settings()->set('key', 'value');
$user->settings()->get('key');
$user->settings()->has('key');
$user->settings()->forget('key');

// This will be stored in the "visuals" collection
$user->settings()->collection('visuals')->all();
$user->settings()->collection('visuals')->set('key', 'value');
$user->settings()->collection('visuals')->get('key');
$user->settings()->collection('visuals')->has('key');
$user->settings()->collection('visuals')->forget('key');
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://basecode.sh)
