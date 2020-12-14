# Easily filter eloquent model queries from HTTP requests

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/simple-query-filter.svg?style=flat-square)](https://packagist.org/packages/stephenjude/simple-query-filter)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/stephenjude/simple-query-filter/run-tests?label=tests)](https://github.com/stephenjude/simple-query-filter/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/stephenjude/simple-query-filter.svg?style=flat-square)](https://packagist.org/packages/stephenjude/simple-query-filter)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/package-simple-query-filter-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/package-simple-query-filter-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require stephenjude/simple-query-filter
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Stephenjude\SimpleQueryFilter\SimpleQueryFilterServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Stephenjude\SimpleQueryFilter\SimpleQueryFilterServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
$simple-query-filter = new Stephenjude\SimpleQueryFilter();
echo $simple-query-filter->echoPhrase('Hello, Stephenjude!');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Stephen Jude](https://github.com/StephenJude)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
