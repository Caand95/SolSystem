<?php

require_once "./Model/DbRepository.php";
require_once "./Model/iPlanetRepository.php";
require_once "./Model/Planet.php";

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
        
        // TODO error handling
        try {
            if (!($statement = $this->sqlCon->prepare("CALL getPlanet(?)"))) {
                echo "Prepare failed: (" . $this->sqlCon->errno . ") " . $this->sqlCon->error;
            }

            // Bind string ("s") parameter $name to "?" parameter in prepared statement.
            if (!$statement->bind_param("s", $name)) {
                echo "Binding parameters failed: (" . $statement->errno . ") " . $statement->error;
            }
            
            if (!$statement->execute()) {
                 echo "Execute failed: (" . $statement->errno . ") " . $statement->error;
            }
            
            if (!($result = $statement->get_result())) {
                echo "Getting result set failed: (" . $statement->errno . ") " . $statement->error;
            }

            $row = $result->fetch_array(MYSQLI_NUM);   
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

            $result->free();
        }
        catch (Exception $ex) { 
            die($ex->getMessage()); 
        }

        $this->close();
        return $planet;
    }

    public function getPlanets() : array
    {
        $this->open();
        $planets = array();

        try {
            $result = $this->sqlCon->query("CALL getPlanets()"); // TODO error handling

            if ($result === false) {
                die("GetPlanets() Query failed: " . $this->sqlCon->error);
            }

            //while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            while ($row = $result->fetch_assoc()) {
                $planet = new planet(
                    $row['Name'],
                    $row['Description'],
                    $row['ImagePath'],
                    $row['HexColor'],
                    $row['KmDiameter'],
                    $row['SunDistance'],
                    $row['OrbitalPeriodDays'],
                    $row['Mass'],
                    $row['Temperature'],
                    $row['MoonCount'],
                    $row['HasRings'],
                    $row['PlanetType']);

                array_push($planets, $planet);
            }

            $result->free();
        } 
        catch (Exception $ex) { 
            die($ex->getMessage()); 
        }

        $this->close();
        return $planets;
    }
}

?>