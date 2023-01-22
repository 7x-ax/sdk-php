[![Latest Stable Version](http://poser.pugx.org/7x/sdk/v)](https://packagist.org/packages/7x/sdk) [![Total Downloads](http://poser.pugx.org/7x/sdk/downloads)](https://packagist.org/packages/7x/sdk) [![Latest Unstable Version](http://poser.pugx.org/7x/sdk/v/unstable)](https://packagist.org/packages/7x/sdk) [![License](http://poser.pugx.org/7x/sdk/license)](https://packagist.org/packages/7x/sdk) [![PHP Version Require](http://poser.pugx.org/7x/sdk/require/php)](https://packagist.org/packages/7x/sdk)
# A PHP SDK for 7x APIs

## Install

```
composer require 7x/sdk
```

## Usage

### Timezone API

```
use Psr\Log\LogLevel;
use SevenEx\SDK\Timezone;

$tz = new Timezone('API_KEY', LogLevel::DEBUG);
$result = $tz->get('22.22', '33.33');
// $result is an instance of SevenEx\DTO\Timezone.
$result->timezones; // An array of timezones matching the co-ordinates. Mostly just contains a single string.
```

### Geocode API


### Distance API