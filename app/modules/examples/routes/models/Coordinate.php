<?php

namespace modules\examples\routes\models;

class Coordinate
{
    public $lat;
    public $long;
    public $radius;

    /**
     * @param \stdClass $coordinate
     */
    public function __construct(\stdClass $coordinate)
    {
        $this->lat = $coordinate->lat;
        $this->long = $coordinate->long;
        $this->radius = $coordinate->radius;
    }

    public function getRadius()
    {
        return $this->radius ? ($this->radius / 100000) : (300 / 100000);//Traslate to correct radius
    }
}
