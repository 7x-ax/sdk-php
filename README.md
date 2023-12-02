[![Latest Stable Version](http://poser.pugx.org/7x/sdk/v)](https://packagist.org/packages/7x/sdk) [![Total Downloads](http://poser.pugx.org/7x/sdk/downloads)](https://packagist.org/packages/7x/sdk) [![Latest Unstable Version](http://poser.pugx.org/7x/sdk/v/unstable)](https://packagist.org/packages/7x/sdk) [![License](http://poser.pugx.org/7x/sdk/license)](https://packagist.org/packages/7x/sdk) [![PHP Version Require](http://poser.pugx.org/7x/sdk/require/php)](https://packagist.org/packages/7x/sdk) [![Build Status](https://github.com/7x-ax/sdk-php/actions/workflows/php.yml/badge.svg)](https://github.com/7x-ax/sdk-php/actions)

# A PHP SDK for 7x APIs

To use this SDK, you will need an API Key. Sign up on https://7x.ax to get started.

## Install

```php
composer require 7x/sdk
```

## Usage

### Timezone API

```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Timezone;

$tz = new Timezone('API_KEY', LogLevel::DEBUG);
$result = $tz->get('22.22', '33.33');
// $result is an instance of SevenEx\DTO\Timezone\Timezone.
$result->timezones; // An array of timezones matching the co-ordinates. Mostly just contains a single string.
```

### Distance API

#### Distance by Coordinates
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Distance;

$d = new Distance('API_KEY', LogLevel::DEBUG);
$result = $d->getByCoordinates('22.22', '33.33', '44.44', '55.55', 'km');
// $result is an instance of SevenEx\DTO\Distance\Distance.
$result->distance;
$result->unit; // km if you specified km, or mi if you specified mi. Defaults to km if not specified.
```

#### Distance by Address
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Distance;

$d = new Distance('API_KEY', LogLevel::DEBUG);
$result = $d->getByAddress('Trafalgar Square, London, UK', 'Tower Bridge, London, UK', 'mi');
// $result is an instance of SevenEx\DTO\Distance\Distance.
$result->distance;
$result->unit; // mi in this case.
```

### Geocoding API

#### Geocode by City / Address String 
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Geocode;

$g = new Geocode('API_KEY', LogLevel::DEBUG);
$result = $g->geocode('Trafalgar Square, London, UK');
// $result is an instance of SevenEx\DTO\Geocode\GeocodeCollection. This contains an array of objects.
foreach ($result->objects as $geocoded) {
    var_dump($geocoded->coordinates); // Instance of SevenEx\DTO\Common\Coordinates
    var_dump($geocoded->location); // Instance of SevenEx\DTO\Geocode\Location
}
```

#### Geocode Search (to build search suggest / autocomplete functionality)
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Geocode;

$g = new Geocode('API_KEY', LogLevel::DEBUG);
$result = $g->search('Lon');
// $result is an instance of SevenEx\DTO\Geocode\GeocodeCollection. This contains an array of objects.
foreach ($result->objects as $geocoded) {
    var_dump($geocoded->coordinates); // Instance of SevenEx\DTO\Common\Coordinates
    var_dump($geocoded->location); // Instance of SevenEx\DTO\Geocode\Location
}
```

#### Reverse Geocoding by Coordinates
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Geocode;

$g = new Geocode('API_KEY', LogLevel::DEBUG);
$result = $g->reverse('55.555555', '33.3333333');
// $result is an instance of SevenEx\DTO\Geocode\GeocodeCollection. This contains an array of objects.
foreach ($result->objects as $reversed) {
    var_dump($reversed->coordinates); // Instance of SevenEx\DTO\Common\Coordinates
    var_dump($reversed->location); // Instance of SevenEx\DTO\Geocode\Location
}
```

#### Numbers
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Numbers;

$g = new Numbers('API_KEY', LogLevel::DEBUG);
$result = $g->arabicToLatin('١٢٣٤٥٦٧٨٩٠');
$result = $g->latinToArabic('1234567890');
// $result is an instance of SevenEx\DTO\Numbers\Arabic.
$result = $g->arabicToHtml('١٢٣٤٥٦٧٨٩٠');
// $result is an instance of SevenEx\DTO\Numbers\Html.
```

#### Date and Time
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\DateAndTime;

$g = new DateAndTime('API_KEY', LogLevel::DEBUG);
$result = $g->byTimezone('Europe/London'); // or
$result = $g->byAddress('Trafalgar Square, London, UK'); // or
$result = $g->byCoordinates('51.507351', '-0.127758');
// $result is an instance of SevenEx\DTO\DateAndTime\DateAndTime.
```

#### Geolocation
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Geolocate;

$f = new Geolocate('API_KEY', LogLevel::DEBUG);
$result = $f->ip('109.74.197.73');
// Result is an instance of SevenEx\DTO\Geolocate\Geolocate.
```

#### Airports
```php
use Psr\Log\LogLevel;
use SevenEx\SDK\Airports;

$a = new Airports('API_KEY', LogLevel::DEBUG);
$a->airport('LHR'); // returns is an instance of SevenEx\DTO\Airports\Airports
$a->airports(type: 'large_airport', country: 'ae'); // returns is an instance of SevenEx\DTO\Airports\SingleAirports
$a->types(); // returns is an instance of SevenEx\DTO\Airports\Types
$a->countries(); // returns is an instance of SevenEx\DTO\Airports\CountriesCollection
$a->country('ae'); // returns is an instance of SevenEx\DTO\Airports\CountriesCollection
$a->continents(); // returns is an instance of SevenEx\DTO\Airports\ContinentsCollection
$a->continent('eu'); // returns is an instance of SevenEx\DTO\Airports\ContinentCollection
```
```
