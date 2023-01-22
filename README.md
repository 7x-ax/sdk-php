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