# A PHP SDK for 7x APIs

## Install

```
composer require 7x/sdk
```

## Usage

### Timezone API

```
use Psr\Log\LogLevel;
use x7x\Sdk\Timezone;

$tz = new Timezone('API_KEY', LogLevel::DEBUG);
$result = $tz->get('22.22', '33.33');
```

### Geocode API


### Distance API