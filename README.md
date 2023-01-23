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

### Distance API

## Distance by Coordinates
```
use Psr\Log\LogLevel;
use SevenEx\SDK\Distance;

$d = new Distance('API_KEY', LogLevel::DEBUG);
$result = $d->getByCoordinates('22.22', '33.33', '44.44', '55.55', 'km');
// $result is an instance of SevenEx\DTO\Distance.
$result->distance;
$result->unit; // km if you specified km, or mi if you specified mi. Defaults to km if not specified.
```

## Distance by Address
```
use Psr\Log\LogLevel;
use SevenEx\SDK\Distance;

$d = new Distance('API_KEY', LogLevel::DEBUG);
$result = $d->getByAddress('Trafalgar Square, London, UK', 'Tower Bridge, London, UK', 'mi');
// $result is an instance of SevenEx\DTO\Distance.
$result->distance;
$result->unit; // mi in this case.
```

### Geocode API