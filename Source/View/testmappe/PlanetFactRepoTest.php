<table class="table" style="background-color: white;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Fact</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "./Controller/PlanetController.php";

        $controller = new PlanetController();
        $planets = $controller->getPlanets();
        $selectedPlanet="";

        if(isset($_GET['planet'])) { 
            if(!empty($_GET['planet'])) { 
                foreach ($planets as $Planet) {
                    if ($_GET['planet'] == $Planet->name) {
                        $selectedPlanet = $_GET['planet'];
                        break;
                    } else {
                        $selectedPlanet = "Jorden";
                    }
                }
            }
        }

        $planetFacts = $controller->getPlanetFacts($selectedPlanet);

        if(!empty($planetFacts)){
            foreach($planetFacts as $planetFact){
                printPlanetFact($planetFact);
            }
        }

        function printPlanetFact($planetFact) {
            echo "<tr>";
            echo     "<td>";
            echo         $planetFact->id;
            echo     "</td>";
            echo     "<td>";
            echo         $planetFact->planetName;
            echo     "</td>";
            echo     "<td>";
            echo         $planetFact->fact;
            echo     "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>