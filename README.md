# DBlog - Custom Laravel Logs Writer 

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

DBlog is a lightweight and simple to use Laravel Package that allows you write custom logs and error messages to a database table.

Written to mirror the Laravel Log functions, plus providing the 8 logging levels defined in [RFC 5424] (https://tools.ietf.org/html/rfc5424), this package provides a quick and simple way to log messages and context to a custom database table.  

__NOTE:__  This package DOES NOT integrate and DOES NOT replace Laravel App or Monolog logging system. This is a separate logging system for capturing custom log messages. 

## Installation

Via Composer:

``` bash
$ composer require supersixtwo/dblog
```

Then add the service provider in `config/app.php`:

``` php
Supersixtwo\Dblog\DblogServiceProvider::class,
```

And the alias in `config/app.php`:

``` php
'DBlog'		=> Supersixtwo\Dblog\DblogClass::class,
```

Re-run the autoload:

``` bash
$ composer dump-autoload
```

Publish the migrations:

``` bash
$ php artisan vendor:migrate
```

Run the migrations to install the tables in the database:

``` bash
$ php artisan migrate
```

## Usage

### Logging Messages

We've provided `DBlog` with a familiar interface mirroring Laravel's own built-in logging methods. These follow the same RFC 5424 defined logging levels including: __emergency, alert, critical, error, warning, notice, info, and debug__. 

``` php
DBlog::emergency($msg);
DBlog::alert($msg);
DBlog::critical($msg);
DBlog::error($msg);
DBlog::warning($msg);
DBlog::notice($msg);
DBlog::info($msg);
DBlog::debut($msg);
```
### Contextual Information

In addition to logging text based messages, you can also an array of contextual information to the logging methods. This contextual data will converted to a `json` array and stored in separate column.

``` php
DBlog::info('New User Creation', ['id' => 45, 'created_by' => 'jdoe']);
``` 

## Database Schema



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email troy@supersixtwo.com instead of using the issue tracker.

## Credits

- [Troy Peterson][http://www.supersixtwo.com]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/supersixtwo/dblog.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpsupersixtwo/dblog/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpsupersixtwo/dblog.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpsupersixtwo/dblog.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/supersixtwo/dblog.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/supersixtwo/dblog
[link-travis]: https://travis-ci.org/thephpsupersixtwo/dblog
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpsupersixtwo/dblog/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpsupersixtwo/dblog
[link-downloads]: https://packagist.org/packages/supersixtwo/dblog
[link-author]: https://github.com/supersixtwo
[link-contributors]: ../../contributors
