<?php

interface iCelestialElementRepository
{
    public function getCelestialElement($name) : CelestialElement;
    public function getCelestialElements() : array;
}

?>