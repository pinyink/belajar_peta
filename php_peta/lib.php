<?php

class Polygon 
{
    private $array = [];
    private $d2r = 3.14 / 180;

    public function setCoordinate(float $lat, float $lng)
    {
        array_push($this->array, ['lat' => round($lat, 6), 'lng' => round($lng, 6)]);
    }

    public function getCount()
    {
        return count($this->array);
    }

    public function getCoordinate()
    {
        return $this->array;
    }

    public function getArea()
    {
        $area = 0.0;

        if ($this->getCount() > 2) {
            for ($i=0; $i < $this->getCount(); $i++) { 
                $p1 = $this->array[$i];
                $p2 = $this->array[($i + 1) % $this->getCount()];
                $area += (($p2['lng'] - $p1['lng']) * $this->d2r) * ( 2 + sin($p1['lat'] * $this->d2r) + sin($p2['lat'] * $this->d2r));
            }
            $area = $area * floatval(6378137.0) * floatval(6378137.0) / floatval(2.0);
        }

        return abs($area);
    }
}