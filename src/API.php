<?php
namespace WAQI;
use WAQI\Entity\{
    CityFeed,
    Search,
    GeoFeed,
    IPFeed,
    MapStation
};

/**
 * Class API
 *
 * Factory class for the API entities
 *
 * @package WAQI
 */
class API
{
    private $apiKey;

    public function __construct($apiKey) 
    {
        $this->apiKey = $apiKey;
    }

    public function cityFeed() 
    {
        return new CityFeed($this->apiKey);
    }

    public function search() 
    {
        return new Search($this->apiKey);
    }

    public function geoFeed() 
    {
        return new GeoFeed($this->apiKey);
    }

    public function ipFeed() 
    {
        return new IPFeed($this->apiKey);
    }

    public function mapStation() 
    {
        return new MapStation($this->apiKey);
    }
}