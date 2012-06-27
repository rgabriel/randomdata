Random Data
===========

For various purposes you might need random data to test your application. Writing a random generator is relative easy. But writing the same over and over can be tiresome. Also there is a problem if you have alternative locales you have to test against, that you reinvent the wheel yet again.

For this I created this small collection of classes, hoping others will find them as useful as they were for me. More country specific settings and locales are always very welcome.

(Work in Progress)

Useage
------

Use a PSR-0 compliant autoloader and point it to the right directory. Then get the generator: `$generator = new Randomdata\Generator();`

Structure
---------
The Randomdata package is split in creators and formatters. Creators are frontends to get the data, formatters are the actual implementation in a specific locale. Creators get loaded with a locale and if that is not avaialble, uses a fall back. If the fallback also does not exist, an exception is thrown. The system comes with en_US as default and as default fallback. Unless you specify something specific as fallback, you will have no troubles in all operations.

You can feed the generator on construction a new randomizer (otherwise it uses a default implementation).

With this, one generator is used for one locale, you can't switch locales in the middle of operation, but have to create a new generator. This is by design, but could be removed as a limitation later.

Internally the generator calls a creator to create a new value or instances. The creators then call the formatters to get the locale specifc (if applicable) data for that.