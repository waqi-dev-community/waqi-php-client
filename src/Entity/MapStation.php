<?php
namespace WAQI\Entity;

class MapStation extends WaqiAPIEntity 
{
    public function setMapBounds($latitudeNorth, $longitudeWest, $latitudeSouth, $longitudeEast) {
        $this->queryParams['latlng'] = "$latitudeNorth,$longitudeWest,$latitudeSouth,$longitudeEast";
        return $this; // Return the class object to enable method chaining
    }

    protected function url() {
        return "{$this->baseUrl}map/bounds/";
    }
}