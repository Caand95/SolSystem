<?php

class PlanetFact
{
    public $id;
    public $planetName;
    public $fact;

    public function __construct($id, $planetName, $fact)
    {
        $this->id         = $id;
        $this->planetName = $planetName;
        $this->fact       = $fact;
    }

    public function __destruct()
    {
        $this->id         = null;
        $this->planetName = null;
        $this->fact       = null;
  	}
}

?>