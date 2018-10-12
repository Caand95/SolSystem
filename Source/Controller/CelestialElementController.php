<?php

require_once "./Model/CelestialElementDbRepository.php";

class CelestialElementController
{
    private $celestialElementRepository = null;

    public function __construct()
    {
        $this->celestialElementRepository = new CelestialElementDbRepository("127.0.0.1", "root", "", "PlanetDB");
    }

    public function __destruct()
    {
        $this->celestialElementRepository = null;
  	}

    public function getCelestialElement($name) : CelestialElement 
    {
        $CelestialElement = $this->celestialElementRepository->getCelestialElement($name);
        return $CelestialElement;
    }

    public function getCelestialElements() : array
    {
        $CelestialElements = $this->celestialElementRepository->getCelestialElements();
        return $CelestialElements;
    }
}

?>