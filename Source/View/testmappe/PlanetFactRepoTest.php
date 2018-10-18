<table class="table">
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
        $planetFacts = $controller->getPlanetFacts('Jorden');

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