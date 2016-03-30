# kirby-phpdotenv

A simple wrapper around [vlucas' PHP dotenv library](https://github.com/vlucas/phpdotenv) for [Kirby CMS](http://getkirby.com).

## Why?

I've been using `.env` in my Kirby projects for a while, but I got tired of pasting in the `env()` function for every new site. So, I created this package instead.

## Quick Example

```bash
# .env
APP_DEBUG=true
```
```php
# site/config/config.php
c::set('debug', env('APP_DEBUG', false));
```
```php
# elsewhere
c::get('debug'); // true
```

## Install

Install via composer

```bash
composer require jevets/kirby-phpdotenv dev-master
```

## Usage

### 1. Instantiate

In your site's `index.php` file (or in [`site.php` file](http://getkirby.com/docs/advanced/customized-folder-setup)), load Composer's autoloader.

```php
require_once 'path/to/vendor/autoload.php';
```

Then instantiate with:

1. The path where dotenv can find your `.env` file
2. A file name other than `.env`

```php 
new Jevets\Kirby\Dotenv\Dotenv(__DIR__ . DS, '.env');
```

**Note:** `Jevets\Kirby\Dotenv\Dotenv` will instantiate *and* run `[dotenv]->load()` for you.

### 2. Create your `.env` file

```sh
KIRBY_LICENSE=1234-12345-123456

APP_MODE=production
APP_DEBUG=true
```

### 3. Use in `config.php` file(s)

```php
c::set('license', env('KIRBY_LICENSE', 'put your license in .env'));
c::set('debug', env('APP_DEBUG', false));

c::get('license'); // "1234-12345-123456"
c::get('debug'); // true
```

This library loads a global helper function:

`function env($key, $default = '') {...}`

**Note** `function env()` declaration is wrapped in `if (!function_exists('env'))` so you can override it or use your own method.

## Customized folder setup

In my Kirby projects, I usually keep this folder structure:

```bash
project/
  .env
  .env.example
  .gitignore
  package.json
  composer.json
  site/
    accounts/
    blueprints/
    cache/
    config/
    snippets/
    templates/
  public/
    kirby/
      toolkit/
    panel/
    content/
    assets/
    thumbs/
    index.php
    site.php
  src/
  vendor/
```

And here's my typical `site.php`

```php
# Composer autoload
require __DIR__ . DS . '..' . DS . 'vendor' . DS . 'autoload.php';

# DotEnv
new Jevets\Kirby\Dotenv\Dotenv(__DIR__ . DS . '..');

# Setup Kirby
$kirby = kirby();
$kirby->roots()->site = __DIR__ . DS . '..' . DS . 'site';
```

## ChangeLog

### 0.0.3

- Rename class alias in helpers.php from `String` to `Str` for PHP7 compatibility

### 0.0.2

- Initial release

## Collaborating

Pull requests and suggestions are quite welcome!

## Credits

- All credit for dotenv goes to vlucas for his great work on [PHP dotenv](https://github.com/vlucas/phpdotenv). I just wrapped it up in a package to speed up development of Kirby-based sites.
- I stole Taylor Otwell's `env()` function from [Laravel 5.1](http://laravel.com/), with a couple tweaks to get it working with Kirby. 

## Bugs/Issues

Please use the issue tracker on the [GitHub repo](https://github.com/jevets/kirby-phpdotenv/issues).
