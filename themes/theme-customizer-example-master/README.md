# Theme Customizer Example

Theme Customizer Example is a very simple theme used to demonstrate how to integrate the [Theme Customizer](https://codex.wordpress.org/Theme_Customization_API) into a WordPress theme.

## Installation

Note that this theme is not in development. It serves as a demo for the companion article.

1. Clone the repository or extract the archive to your `wp-content/themes` directory
2. Verify that the theme is available in your Themes dashboard

## Changelog

_1.1.0_ (2015 August 17)

* Fixing a couple of filename mishaps. 

_1.0.2_ (2015 August 7)

* Added `'sanitize_callback' => 'tcx_sanitize_input'` to all `add_setting()` methods in `functions.php`, which are required when adding themes to the WordPress theme repository.
* Changed `tcx_sanitize_copyright` to `tcx_sanitize_input` for readability purposes
* Updating the version number of the theme

_1.0.1_ (2014 March 19)

* Added a semicolon to allow the body's *font-family* to show correctly.

_1.0.0_ (2013 October 2)

* Adding code comments, updating certain tags, and making sure the code is up to the WordPress coding standards
* Changing the anchor's target in the `index.php` template
* Updating the version number of the theme

_0.6.0_ (2013 September 30)

* Implemented `WP_Customize_Image_Upload` for setting the background image.

_0.5.0_ (2013 September 25)_

* Implementing the "Color Scheme" options, the "Theme Font" options, and the "Copyright Message" option

_0.4.0 (2013 September 24)_

* Implementing the 'Display Options' section with a 'Display Header' setting and checkbox control

_0.3.0 (2013 September 19)_

* Implementing the `theme-customizer.js` file for using the `postMessage` transport method.

_0.2.0 (2013 September 19)_

* Committing a working version of the theme with the Theme Customizer implemented using the `refresh` transport method.

_0.1.0 (2013 September 10)_

* Initial commit of the basic theme (without the customizer)
