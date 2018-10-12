<!--Menu-->
<?php //SNASK
    function GetPlanets(){
        return array(
            "Sol" => array(
                "name" => "Sol"
            ),
            "Earth" => array(
                "name" => "Earth"
            ),
            "Pluto" => array(
                "name" => "Pluto"
            )
        );
    }
    function GetCelestial(){
        return array(
            "Planet" => array(
                "name" => "Planet"
            ),
            "Star" => array(
                "name" => "Star"
            ),
            "DwarfStar" => array(
                "name" => "Dwarf Star"
            )
        );
    }

$listPlanets = json_decode(json_encode(GetPlanets(), FALSE));
$listCelestialElements = json_decode(json_encode(GetCelestial()), FALSE);

?>
<!-- first item -->
<section class="menubar">
    <span class="menubar-item">
        <a href="?page=View1">
            <button class="btn">View1</button>
        </a>
    </span>

    <!-- second item -->
    <span class="menubar-item">
        <section class="dropdown">
            <a href="?page=View2">
                <button class="btn">View2</button>
            </a>
            <section class="dropdown-content">
                <?php
            foreach($listPlanets as $Planet){
                echo "<a href=\"?page=View2&PlanetName=$Planet->name\">$Planet->name</a>";
            }
			?>
                <!--osv.-->
            </section>
        </section>
    </span>

    <!-- third item -->
    <span class="menubar-item">
        <section class="dropdown">
            <a href="?page=View3">
                <button class="btn">View3</button>
            </a>
            <section class="dropdown-content">
                <?php
            foreach($listCelestialElements as $Element){
                echo "<a href=\"?page=View3&CelestialElement=$Element->name\">$Element->name</a>";
            }
			
            ?>
                <!--osv.-->
            </section>
        </section>
    </span>
</section>
