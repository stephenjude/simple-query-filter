# Simple Query Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/simple-query-filter.svg?style=flat-square)](https://packagist.org/packages/stephenjude/simple-query-filter)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/stephenjude/simple-query-filter/run-tests?label=tests)](https://github.com/stephenjude/simple-query-filter/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/stephenjude/simple-query-filter.svg?style=flat-square)](https://packagist.org/packages/stephenjude/simple-query-filter)

This package allows you to filter eloquent model queries based on HTTP request.

## Installation

You can install the package via composer:

```bash
composer require stephenjude/simple-query-filter
```
## Usage

### Add the `WithQueryFilter` trait to your searchable model:
```php
use Stephenjude\SimpleQueryFilter\WithQueryFilter;

class Post extends Model
{
    use WithQueryFilter;
}
```
### Filter a query based on a request: /posts?column_name=search_string:
```php

class PostController extends Controller
{
    public function index(Request $request)
    {
        // GET /posts?title=simple&slug=simple-query-filter
        $posts = Post::filter($request->query())->latest()->paginate();
    }
}
```
### Custom Query Parameters
You can alternatively pass an array of column names and search strings as a key-value pair to the filter method:
```php
    $queryParams = [
        'title' => 'Simple',
        'description' => 'Query Filter'
    ];

    $posts = Post::filter($queryParam)->latest()->paginate();
```
## Column Not Found Exception
The eloquent filter scope provided in this package will throw a bad request HTTP exception if it fails to find any of the spacified column names. 
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
