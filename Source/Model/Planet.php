<?php

class Planet
{
    public $name;
    public $description;
    public $imagePath;
    public $hexColor;
    public $kmDiameter;
    public $sunDistance;
    public $orbitalPeriodDays;
    public $mass;
    public $temperature;
    public $moonCount;
    public $hasRings;
    public $planettype;

    protected function __construct($name, $description, $imagePath, 
        $hexColor, $kmDiameter, $sunDistance, $orbitalPeriodDays, 
        $mass, $temperature, $moonCount, $hasRings, $planettype)
    {
        $this->$name              = $name;
        $this->$description       = $description;
        $this->$imagePath         = $imagePath;
        $this->$hexColor          = $hexColor;
        $this->$kmDiameter        = $kmDiameter;
        $this->$sunDistance       = $sunDistance;
        $this->$orbitalPeriodDays = $orbitalPeriodDays;
        $this->$mass              = $mass;
        $this->$temperature       = $temperature;
        $this->$moonCount         = $moonCount;
        $this->$hasRings          = $hasRings;
        $this->$planettype        = $planettype;
    }

    function __destruct()
    {
        $this->$name              = null;
        $this->$description       = null;
        $this->$imagePath         = null;
        $this->$hexColor          = null;
        $this->$kmDiameter        = null;
        $this->$sunDistance       = null;
        $this->$orbitalPeriodDays = null;
        $this->$mass              = null;
        $this->$temperature       = null;
        $this->$moonCount         = null;
        $this->$hasRings          = null;
        $this->$planettype        = null;
  	}
}

?>