# Hybrid\\Customize

Hybrid Customize is an add-on package for the [Hybrid Core](https://github.com/justintadlock/hybrid-core) WordPress theme framework that creates extra controls and settings that theme authors can use to build their themes.

The following controls are available:

- **Checkbox Multiple:** Displays a list of checkboxes to choose multiple values.
- **Dropdown Terms:** Outputs a dropdown select of a given list of taxonomy terms.
- **Palette:** Creates a selection of color palettes to choose from.
- **Radio Image:** Replaces radio buttons with custom images.
- **Select Group:** Displays a dropdown select that supports grouping.
- **Select Multiple:** Creates a multiple select box.

The following settings are available:

- **Array Map:** Allows you to store an array of values as a theme setting. Sanitize callback is run through `array_map()`.
- **Image Data:** When used with the core WP image control, saves the image URL, height, width, and ID in an extra theme mod (note: only works with theme mods).

## Requirements

* WordPress 4.9+.
* PHP 5.6+ (preferably 7+).
* [Composer](https://getcomposer.org/) for managing PHP dependencies.

## Documentation

This project is only meant to work in conjunction with the Hybrid Core framework.  If you're not already working with and building a theme using it, the following will be useless.

### Installation

First, you'll need to open your command line tool and change directories to your theme folder.

```bash
cd path/to/wp-content/themes/<your-theme-name>
```

Then, use Composer to install the package.

```bash
composer require justintadlock/hybrid-customize
```

### Register the service provider

You need to register the service provider during your bootstrapping process.  In your bootstrapping code, you should have something like the following:

```php
$app = new \Hybrid\Core\Application();
```

After that point, you can register the service provider:

```php
$app->provider( \Hybrid\Customize\ServiceProvider::class );
```

This is basically going to set up and ready any JS-based customizer controls.

## Copyright and License

This project is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2018 &copy; [Justin Tadlock](http://justintadlock.com).
