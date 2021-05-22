<?php

class Cylinder
{
    public function getVolume($radius, $height)
    {
        $baseArea = $this->getBaseArea($radius);
        $perimeter = $this->getPerimeter($radius);
        return $perimeter * $height + 2 * $baseArea;
    }


    public function getBaseArea($radius)
    {
        return pi() * $radius * $radius;
    }


    public function getPerimeter($radius)
    {
        return 2 * pi() * $radius;
    }
}