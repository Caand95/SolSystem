<?php

interface iPlanetRepository
{
    public function getPlanet($name) : Planet;
    public function getPlanets() : array;
}

?>