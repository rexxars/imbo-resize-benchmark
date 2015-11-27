# imbo resize benchmark

Simple resize benchmark for Imbo.
Grabs the X latest images and downloads resized copies, timing how long the operations took.

Number of images, iteration count and image size can be can be configured.

## Usage

* Run `composer install` (see https://getcomposer.org/)
* Copy `config/config.php.dist` to `config/config.php`
* Adjust values to match your Imbo installation and preferred settings
* Run `php bench.php`

## Disclaimer

This isn't meant to be some super scientific benchmark - it's primarily built to test how different code paths/configuration settings affects the speed of resizing images, which is usually the most used feature in Imbo. More important thing to note is that it is the **client** that provides the timing of operations, not the server, so download speed plays a role in the result.

## License

MIT-licensed. See LICENSE.
