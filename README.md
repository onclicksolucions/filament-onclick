# This is my package filament-onclick


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require onclicksolucions/filament-onclick
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-onclick-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-onclick-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-onclick-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentOnClick = new OnClick\FilamentOnClick();
echo $filamentOnClick->echoPhrase('Hello, OnClick!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [OnClick](https://github.com/onclicksolucions)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
