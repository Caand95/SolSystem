<?php

class PlanetDbRepository extends DbRepository implements iPlanetRepository
{
    public function __construct($hostname, $user, $pass, $db)
    {
        parent::__construct($hostname, $user, $pass, $db);
    }

    public function __destruct()
    {
        parent::__destruct();
  	}

    public function getPlanet($name) : Planet 
    {
        $this->open();
        
        $result = mysqli_query($this->sqlCon, "CALL getPlanet($name)") 
            or die("Query fail: " . mysqli_error()); // TODO error handling
        
        $row = mysqli_fetch_array($result);   
        $planet = new planet(
            $row[0],   // Name
            $row[1],   // Description
            $row[2],   // ImagePath
            $row[3],   // HexColor
            $row[4],   // KmDiameter
            $row[5],   // SunDistance
            $row[6],   // OrbitalPeriodDays
            $row[7],   // Mass
            $row[8],   // Temperature
            $row[9],   // MoonCount
            $row[10],  // HasRings
            $row[11]); // PlanetType

        mysqli_free_result($result);
        $this->close();
        return $planet;
    }

    public function getPlanets() : array
    {
        $this->open();
        $planets = array();

        //$result = mysqli_query($this->$sqlCon, "CALL getPlanets()") or die("Query fail: " . mysqli_error());
        $result = $this->sqlCon->query("CALL getPlanets()"); // TODO error handling

        //while ($row = mysqli_fetch_array($result)) {
        while ($row = $result->fetch_array(MYSQLI_NUM)) {    
            $planet = new planet(
                $row[0],   // Name
                $row[1],   // Description
                $row[2],   // ImagePath
                $row[3],   // HexColor
                $row[4],   // KmDiameter
                $row[5],   // SunDistance
                $row[6],   // OrbitalPeriodDays
                $row[7],   // Mass
                $row[8],   // Temperature
                $row[9],   // MoonCount
                $row[10],  // HasRings
                $row[11]); // PlanetType

            array_push($planets, $planet);
            $result->free();
        }

        $this->close();
        return $planets;
    }
}

?>