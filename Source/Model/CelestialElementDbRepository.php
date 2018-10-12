<?php

require_once "./Model/DbRepository.php";
require_once "./Model/iCelestialElementRepository.php";
require_once "./Model/CelestialElement.php";

class CelestialElementDbRepository extends DbRepository implements iCelestialElementRepository
{
    public function __construct($hostname, $user, $pass, $db)
    {
        parent::__construct($hostname, $user, $pass, $db);
    }

    public function __destruct()
    {
        parent::__destruct();
  	}

    public function getCelestialElement($name) : CelestialElement 
    {
        $this->open();
        
        // TODO error handling
        try {
            if (!($statement = $this->sqlCon->prepare("CALL getCelestialElement(?)"))) {
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
            $CelestialElement = new CelestialElement(
                $row[0],  // Name
                $row[1],  // Description
                $row[2]); // ImagePath

            $result->free();
        }
        catch (Exception $ex) { 
            die($ex->getMessage()); 
        }

        $this->close();
        return $CelestialElement;
    }

    public function getCelestialElements() : array
    {
        $this->open();
        $CelestialElements = array();

        try {
            $result = $this->sqlCon->query("CALL getCelestialElements()"); // TODO error handling

            if ($result === false) {
                die("GetCelestialElements() Query failed: " . $this->sqlCon->error);
            }

            //while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            while ($row = $result->fetch_assoc()) {
                $CelestialElement = new CelestialElement(
                    $row['NAME'],
                    $row['Description'],
                    $row['ImagePath']);

                array_push($CelestialElements, $CelestialElement);
            }

            $result->free();
        } 
        catch (Exception $ex) { 
            die($ex->getMessage()); 
        }

        $this->close();
        return $CelestialElements;
    }
}

?>