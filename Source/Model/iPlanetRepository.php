<?php

interface iPlanetRepository
{
    public function getPlanet($name) : Planet;
    public function getPlanets() : array;
    public function getPlanetFacts($planetName) : array;
}

?>