<?php
namespace WAQI\Entity;

class CityFeed extends WaqiAPIEntity 
{
    public function setCity($city) 
    {
        $this->queryParams['city'] = $city;
        return $this; // Return the class object to enable method chaining
    }

    protected function url() 
    {
        // /feed/:city/?token=:token
        $url = "{$this->baseUrl}feed/{$this->queryParams['city']}/";
        $this->queryParams = [];
        return $url;
    }
}