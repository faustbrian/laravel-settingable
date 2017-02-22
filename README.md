# Laravel Settingable

I would appreciate you taking the time to look at my [Patreon](https://www.patreon.com/faustbrian) and considering to support me if I'm saving you some time with my work.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-settingable
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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
