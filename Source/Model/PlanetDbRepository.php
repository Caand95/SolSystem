<?php

class PlanetDbRepository extends DbRepository implements iPlanetRepository
{
    public function getPlanet($name) : Planet 
    {
        $this->open();
        
		// WIP Don't judge O_o
		
		
        // if (!($stmt = $this->sqlCon->prepare("CALL getPlanet($name)"))) {
            // echo "Prepare failed: " . $this->sqlCon->errno . " - " . $this->sqlCon->error;
        // }
        
        // if (!$stmt->execute()) {
            // echo "Execute failed: " . $stmt->errno . " - " . $stmt->error;
        // }
        
        // do {
            // if ($res = $stmt->get_result()) {
                // printf("---\n");
                // var_dump(mysqli_fetch_all($res));
                // mysqli_free_result($res);
            // } else {
                // if ($stmt->errno) {
                    // echo "Get_result failed: " . $stmt->errno . " - " . $stmt->error;
                // }
            // }
        // } while ($stmt->more_results() && $stmt->next_result());



        $this->close();
    }

    public function getPlanets() : array
    {

    }
}

?>