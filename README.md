# WAQI PHP Client

PHP client library for the World Air Quality Index (WAQI) APIs. See documentation [here](https://aqicn.org/json-api/doc/).
All available API modules are supported - City feed, Geolocalized feed, Search, and Map Queries.

### Installation

You can install this package with composer using the command below

```shell
 composer require waqidevs/waqi-php-client
```

### Get API key

Sign up for an API key [here](https://aqicn.org/data-platform/token/)

### Making Requests

The primary `WAQI\API` class is a factory class that creates objects for each of the API modules, allowing you to make requests to any of them with your desired request parameters. You have to first create an object for it, then access your desired API module via the object. See the code snippets below:

```php
$api = new WAQI\API(WAQI_TOKEN);
```

**For City Feed:**

```php
$response = $api->cityFeed()
    ->setCity("Munich")
    ->fetch();
```

**For Search:**

```php
$response = $api->search()
    ->setKeyword("Johannesburg")
    ->fetch();
```

**For Lat/Lng based Geolocalized feed:**

```php
$response = $api->geoFeed()
    ->setCoordinates(37.7749, -122.4194)
    ->fetch();
```

**For IP based Geolocalized feed:**

```php
$response = $api->ipFeed()
    ->setIP("MY_IP")
    ->fetch();
```

**For Map Queries:**

```php
$response = $api->mapStation()
    ->setMapBounds(40.712, -74.006, 34.052, -118.243)
    ->fetch();
```
