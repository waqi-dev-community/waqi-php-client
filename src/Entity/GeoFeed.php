<?php
namespace WAQI\Entity;

class GeoFeed extends WaqiAPIEntity 
{
    public function setCoordinates($latitude, $longitude) 
    {
        $this->queryParams['lat'] = $latitude;
        $this->queryParams['lon'] = $longitude;
        return $this; // Return the class object to enable method chaining
    }

    protected function url() 
    {
        // /feed/geo::lat;:lng/?token=:token
        $url = "{$this->baseUrl}feed/geo:{$this->queryParams['lat']};{$this->queryParams['lon']}/";
        $this->queryParams = [];
        return $url;
    }
}