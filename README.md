# Hybrid\\Customize

Hybrid Customize is an add-on package for the [Hybrid Core](https://github.com/themehybrid/hybrid-core) WordPress theme framework that creates extra controls and settings that theme authors can use to build their themes.

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
* PHP 7.4+ (preferably 8+).
* [Composer](https://getcomposer.org/) for managing PHP dependencies.

## Documentation

You need to register the service provider during your bootstrapping process:

```php
$slug->provider( \Hybrid\Customize\Provider::class );
```

This is basically going to set up and ready any JS-based customizer controls.

## Copyright and License

This project is licensed under the [GNU GPL](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2008&thinsp;&ndash;&thinsp;2024 &copy; [Theme Hybrid](https://themehybrid.com).
