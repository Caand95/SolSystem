<?php

class CelestialElement
{
    public $name;
    public $description;
    public $imagePath;

    public function __construct($name, $description, $imagePath)
    {
        $this->name        = $name;
        $this->description = $description;
        $this->imagePath   = $imagePath;
    }

    public function __destruct()
    {
        $this->name        = null;
        $this->description = null;
        $this->imagePath   = null;
  	}
}

?>