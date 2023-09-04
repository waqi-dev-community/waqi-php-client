<?php
namespace WAQI\Tests;

use PHPUnit\Framework\TestCase;
use WAQI\API;

class APITest extends TestCase {

    static protected $API_KEY = "YOUR_WAQI_TOKEN";

    private function getAPIFactory()
    {
        return new API(static::$API_KEY);
    }

    public function testCityFeedAPI() {
        $factory = $this->getAPIFactory();
        
        $cityFeedAPI = $factory->cityFeed();
        $response = $cityFeedAPI->setCity('example_city')->fetch();
        $this->assertIsObject($response);
    }

    public function testSearchAPIReturnsArray() {
        $factory = $this->getAPIFactory();
        $searchAPI = $factory->search();
        $response = $searchAPI->setKeyword('keyword')->fetch(true);

        $this->assertIsArray($response);
    }

    public function testGeoFeedAPI() {
        $factory = $this->getAPIFactory();

        $geoFeedAPI = $factory->geoFeed();
        $response = $geoFeedAPI->setCoordinates(37.7749, -122.4194)->fetch();

        $this->assertIsObject($response);
    }

    public function testIPFeedAPI() {
        $factory = $this->getAPIFactory();

        $ipFeedAPI = $factory->ipFeed();
        $response = $ipFeedAPI->setIP('8.8.8.8')->fetch();

        $this->assertIsObject($response);
    }

    public function testMapStationsAPI() {
        $factory = $this->getAPIFactory();

        $mapStationsAPI = $factory->mapStation();
        $response = $mapStationsAPI
            ->setMapBounds(40.712, -74.006, 34.052, -118.243)
            ->fetch();

        $this->assertIsObject($response);
    }
}
