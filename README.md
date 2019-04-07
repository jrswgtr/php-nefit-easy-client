# Nefit Easy™ PHP client
A PHP client package written for ```robertklep/nefit-easy-http-server```, which is meant to be running at the same machine.

Before using this package, please proceed to follow the [instructions to install robertklep/nefit-easy-http-server](https://github.com/robertklep/nefit-easy-http-server).

## Dependencies
This package needs a minimum version of PHP 7.2, php-curl and php-json. There are no 3rd party dependencies.

## Installation
To add this package to you project, execute:

```bash
$ composer require wagter/php-nefit-easy-client
```

## Basic usage

To read and write ```Wagter\NefitEasyClient\State\State``` objects from and to the Nefit Easy server you'll need a ```Wagter\NefitEasyClient\StateManager\StateMangerInterface``` instance. The default  ```StateMangerInterface``` implementation is ```Wagter\NefitEasyClient\StateManager\StateManger```.

The ```StateManager``` class has two dependencies. A ```Wagter\NefitEasyClient\Client\HttpClient``` instance to load the data from the ```nefit-easy-http-server``` installation. And a ```Wagter\NefitEasyClient\Normalizer\Normalizer``` instance to normalize and denormalize the requested objects.

### Example
Let's say you want to adjust the manual room temperature to 19.5 degrees Celsius

```php
use Wagter\NefitEasyClient\StateManager\StateManager;
use Wagter\NefitEasyClient\Client\CurlClient;
use Wagter\NefitEasyClient\Normalizer\MinMaxValueTemperatureStateNormalizer;
use Wagter\NefitEasyClient\State\HeatingCircuits\Hc1\TemperatureRoomManual;

$stateManager = new StateManager(
    new CurlClient( 'http://127.0.0.1:3000' ), // the default HttpClient implementation
    new MinMaxValueTemperatureStateNormalizer() // the Normalizer object
);

$tempRoomMan = $stateManager->read( TemperatureRoomManual::class );
$tempRoomMan->setValue( 16.5 );
$stateManager->write( $tempRoomMan );
```

## Run the test
Follow these steps to run the included test
### Download and install the package
```bash
$ git clone git@github.com:jrswgtr/php-nefit-easy-client.git
$ cd php-nefit-easy-client
$ composer install
```
### Start PHP's built-in web server and run the test
```bash
$ php -S localhost:8000
```
Run the test in your browser by visiting [http://127.0.0.1:8000/test.php](http://127.0.0.1:8000/test.php).
