<?php
namespace WAQI\Entity;

class IPFeed extends WaqiAPIEntity 
{
    public function setIP($ipAddress) 
    {
        $this->queryParams['ip'] = $ipAddress;
        return $this; // Return the class object to enable method chaining
    }

    protected function url() 
    {
        return "{$this->baseUrl}feed/here/";
    }
}