<?php

class PlanetController
{
    private $planetRepository = null;

    public function __construct()
    {
        $this->planetRepository = new PlanetDbRepository("127.0.0.1", "user", "pass", "PlanetDB");
    }

    public function __destruct()
    {
        $this->planetRepository = null;
  	}

    public function getPlanet($name) : Planet 
    {
        $this->planetRepository->getPlanet($name);
        return $planet;
    }

    public function getPlanets() : array
    {
        $planets = $this->planetRepository->getPlanets();
        return $planets;
    }
}

?>