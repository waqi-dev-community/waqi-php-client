<?php
namespace WAQI\Entity;

class Search extends WaqiAPIEntity 
{
    public function setKeyword($keyword) 
    {
        $this->queryParams['keyword'] = $keyword;
        return $this; // Return the class object to enable method chaining
    }

    protected function url() 
    {
        return "{$this->baseUrl}search/";
    }
}