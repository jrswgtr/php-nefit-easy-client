# Nefit Easy™ PHP client
A PHP client package written for ```robertklep/nefit-easy-http-server```, which is meant to be running at the same machine, or at least in the same network.

If you not already did, please proceed to follow the [instructions to install robertklep/nefit-easy-http-server](https://github.com/robertklep/nefit-easy-http-server).

## Dependencies
This package needs a minimum version of PHP 7.2, php-curl and php-json. Except for off course a,  ```robertklep/nefit-easy-http-server``` installation, there are no 3rd party dependencies.

## Installation
Add to your project

```bash
$ composer require wagter/php-nefit-easy-client
```

## Basic usage

To read and write ```Wagter\NefitEasyClient\State\State``` objects from and to the Nefit Easy server you will need a ```Wagter\NefitEasyClient\StateManager\StateMangerInterface``` instance. 

The default  ```StateMangerInterface``` implementation is ```Wagter\NefitEasyClient\StateManager\StateManger```.

The ```StateManager``` class has two dependencies. 

 1. A ```Wagter\NefitEasyClient\Client\HttpClient``` instance to load the data from the ```nefit-easy-http-server``` installation. 

 2. A ```Wagter\NefitEasyClient\Normalizer\Normalizer``` instance to normalize and denormalize the requested objects.

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
$tempRoomMan->setValue( 19.5 );
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
### Start PHP's built-in web server
```bash
$ php -S localhost:8000
```
### Run the test
Visit [http://127.0.0.1:8000/test.php](http://127.0.0.1:8000/test.php) in your browser.
