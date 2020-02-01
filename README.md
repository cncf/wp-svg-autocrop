# wp-svg-autocrop
📰🔌🔳🚗🌽Wordpress Plugin that enables SVG autocropping

This plugin validates SVG images on upload and autocrops them. It relies on the [svg-autocrop](https://github.com/cncf/svg-autocrop#svg-autocrop) tool developed by [Andrey Kozlov](https://github.com/andreykozlov1984) and [Dan Kohn](https://www.dankohn.com) for the CNCF [Interactive Landscape](https://landscape.cncf.io/). Autocropping is helpful for letting an SVG be shown as large as possible in a given layout.

# Why Should I Use SVGs?

SVGs are the preferred image format for logos as they’re resolution-independent (that is, they look good no matter how high-resolution your screen or printer is), lightweight (that is, their file size is smaller than other formats), and can be easily converted into PNGs and into print formats (like PDF and EPS). All of the logos in the CNCF [Interactive Landscape](https://landscape.cncf.io/) are SVGs (following our [logo guidelines](https://github.com/cncf/landscape#logos)).

# Why Can't My SVG Include a PNG or JPG?

We reject SVGs that embed a PNG or JPG. These images are much bigger than necessary because the embedded raster image is a less efficient way of describing the image than a vector format like a pure SVG. Also, embedded raster images look blurry at high resolution, while pure SVGs do not. Please get a [valid](#how-can-i-get-a-valid-svg) SVG.

# Why Can't My SVG Include text or tspan Tags?

SVGs need to not rely on external fonts so that they will render correctly in any web browser, whether or not the correct fonts are installed. That means that all embedded text and tspan elements need to be converted to objects. Please follow these [directions](https://github.com/cncf/landscapeapp#svgs-cant-include-text) to convert your SVG if you get this error or, alternatively find a [valid](#how-can-i-get-a-valid-svg) SVG.

# Why Shouldn't I Autotrace to Get an SVG?

Do *not* try to convert PNGs or JPGs to SVGs. You can't automatically go from a low-res to a high-res format, and you'll just waste time and come up with a substandard result. Instead, please get a [valid](#how-can-i-get-a-valid-svg) SVG.

# How Can I Get a Valid SVG?

If you can't find a valid SVG, you can get an original AI or EPS version of the logo and convert it to an SVG at [cloudconvert.com](https://cloudconvert.com). Alternatively, you can have a graphic designer recreate a logo when a high-resolution image is unavailable.
