<?php /*InitNavBarInformation*/
    require_once"./Scripts/LoadPlanets.php";
    require_once"./Scripts/LoadCelestialElements.php";
?>

<!-- first item -->
<section class="menubar">
    <span class="menubar-item">
        <a href="?page=SolSystemet">
            <button class="btn">SolSystemet Oversigt</button>
        </a>
    </span>

    <!-- second item -->
    <span class="menubar-item">
        <section class="dropdown">
            <a href="?page=PlanetInfo">
                <button class="btn">Planet Info</button>
            </a>
            <section class="dropdown-content">
                <?php
            foreach($ListofPlanets as $Planet){
                echo "<a href=\"?page=View2&PlanetName=$Planet->name\">$Planet->name</a>";
            }
			?>
            </section>
        </section>
    </span>

    <!-- third item -->
    <span class="menubar-item">
        <section class="dropdown">
            <a href="?page=RummetsElementer">
                <button class="btn">Rummets Elementer</button>
            </a>
            <section class="dropdown-content">
                <?php
            foreach($ListofCelestialElements as $Element){
                echo "<a href=\"?page=View3&CelestialElement=$Element->name\">$Element->name</a>";
            }
			
            ?>
            </section>
        </section>
    </span>
</section>
