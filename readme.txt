=== SVG Autocrop ===
Contributors: fuerzastudio, cjyabraham
Tags: SVG
Requires at least: 5.0
Tested up to: 6.2
Stable tag: trunk
Requires PHP: 7.4
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

📰🔌🔳🚗🌽 Autocrop your SVGs

== Description ==

📰🔌🔳🚗🌽 This plugin causes all SVG image uploads to be processed by [SVG Autocrop](https://autocrop.cncf.io/autocrop).  The SVG Autocrop service crops an SVG to have a one pixel border on all sides and runs other optimizations to produce the most efficient SVG image.  Read more about the technical details of SVG Autocrop on [its GitHub page](https://github.com/cncf/svg-autocrop#svg-autocrop).

SVG Autcrop is a free service but if you will be autocropping more than a thousand SVGs a month, please create your own autocrop server using [the SVG Autocrop code](https://github.com/cncf/svg-autocrop). If you do use our service, we would appreciate if you would add a link back to [cncf.io](https://www.cncf.io/) from your GitHub project page as a thank you.

This plugin has been coded by [Fuerza Studio](https://www.fuerzastudio.com.br/en/) for [CNCF](https://www.cncf.io/) and [The Linux Foundation](https://www.linuxfoundation.org/).

Note: The plugin requires also having the [Safe SVG plugin](https://wordpress.org/plugins/safe-svg/) activated which enables uploads of SVGs in WordPress and sanitizes them.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wp-svg-autocrop` directory or install the plugin through the WordPress plugins screen directly
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Upload an SVG file to have it autocropped

== Changelog ==

= 0.1.2 =
* Fix dependency declaration on Safe SVG plugin

= 0.1.1 =
* Disabled error reporting to allow SVG uploads to proceed even when autocrop process fails

= 0.1.0 =
* First release
