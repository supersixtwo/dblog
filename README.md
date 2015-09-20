# DBlog - Custom Laravel Logs Writer 

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)

DBlog is a lightweight and simple [Laravel](http://www.laravel.com) Package that allows you write custom logs and error messages to a database table.

Written to mirror the [Laravel Logging](http://laravel.com/docs/master/errors#logging) conventions, `DBlog` provides 8 logging levels defined in [RFC 5424](https://tools.ietf.org/html/rfc5424) and the ability to add an optional context array to each log.   

__NOTE:__  This package DOES NOT integrate with the Laravel / Monolog logging system and does not capture system level events. It's purpose is to be used to capture your own custom log needs.  

## Installation

Via Composer:

``` bash
$ composer require supersixtwo/dblog
```

Then add the service provider in `config/app.php`:

``` php
Supersixtwo\Dblog\DBlogServiceProvider::class,
```

And the alias in `config/app.php`:

``` php
'DBlog'		=> Supersixtwo\Dblog\DBlogClass::class,
```

Re-run the autoload:

``` bash
$ composer dump-autoload
```

Publish the migrations:

``` bash
$ php artisan vendor:publish
```

Run the migrations to install the tables in the database:

``` bash
$ php artisan migrate
```

## Usage

### Logging Messages

We've provided `DBlog` with a familiar interface, mirroring Laravel's own built-in logging methods. These follow the same RFC 5424 defined logging levels including: __emergency, alert, critical, error, warning, notice, info, and debug__. 

Include the `DBlog` at the top of your class or model:

``` php 
use DBlog;
```

Use one of the 8 helper methods in your logic:

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

## DBlog Model and Table

### Model and Table Names

To avoid collisions and naming conflicts with the DBlog Facade or other tables, the database table can be accessed using the following:

* Model Name: `DBlogModel`
* Table Name: `dblogs`

### `dblogs` Table Columns

| Column            | Type             | Default Value     | Nullable | Comments                           |
|-------------------|------------------|-------------------|----------|------------------------------------|
| id                | int(10) unsigned |                   | NO       |                                    |
| level_id          | int(11)          |                   | NO       | The RFC 5424 log level id          |
| level_description | varchar(255)     |                   | NO       | The RFC 5424 log level description |
| message           | text             |                   | NO       |                                    |
| context           | text             |                   | YES      |                                    |
| created_at        | timestamp        | CURRENT_TIMESTAMP | NO       |                                    |

### Querying the Model

First, include the `DBlogModel` with the namespace:

``` php
use Supersixtwo\Dblog\DBlogModel;
```

Then via Query Builder:

``` php
$logs = DB::table('dblogs')->get();
```

or via Eloquent:

``` php 
$logs = DBlogModel::all();
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email appsupport@supersixtwo.com instead of using the issue tracker.

## Credits

- [Troy Peterson](http://www.supersixtwo.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Acknowledgements	

This package is heavily inspired by the [Monolog Logging Library](https://github.com/Seldaek/monolog).

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
