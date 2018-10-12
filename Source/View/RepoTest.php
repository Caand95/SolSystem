<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">ImagePath</th>
            <th scope="col">HexColor</th>
            <th scope="col">KmDiameter</th>
            <th scope="col">SunDistance</th>
            <th scope="col">OrbitalPeriodDays</th>
            <th scope="col">Mass</th>
            <th scope="col">Temperature</th>
            <th scope="col">MoonCount</th>
            <th scope="col">HasRings</th>
            <th scope="col">PlanetType</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "./Controller/PlanetController.php";

        $controller = new PlanetController();
        $planets = $controller->getPlanets();

        if(!empty($planets)){
            foreach($planets as $planet){
                printPlanet($planet);
            }
        }

        $earth = $controller->getPlanet("Jorden");
        printPlanet($earth);

        function printPlanet($planet) {
            echo "<tr>";
            echo     "<td>";
            echo         $planet->name;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->description;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->imagePath;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->hexColor;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->kmDiameter;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->sunDistance;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->orbitalPeriodDays;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->mass;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->temperature;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->moonCount;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->hasRings;
            echo     "</td>";
            echo     "<td>";
            echo         $planet->planetType;
            echo     "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">ImagePath</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "./Controller/CelestialElementController.php";

        $controller = new CelestialElementController();
        $celestialElements = $controller->getCelestialElements();

        if(!empty($celestialElements)){
            foreach($celestialElements as $celestialElement){
                printPlanet($celestialElement);
            }
        }

        $star = $controller->getCelestialElement("Stjerne");
        printCelestialElement($star);

        function printCelestialElement($celestialElement) {
            echo "<tr>";
            echo     "<td>";
            echo         $celestialElement->name;
            echo     "</td>";
            echo     "<td>";
            echo         $celestialElement->description;
            echo     "</td>";
            echo     "<td>";
            echo         $celestialElement->imagePath;
            echo     "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>