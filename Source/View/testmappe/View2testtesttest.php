<?php //IMPORT ?>
<?php require_once "./Scripts/LoadCelestialElements.php"; ?>
<?php require_once "./Scripts/LoadPlanets.php"; ?>
<?php //Snask ?>
<?php $selectedPlanet="";if(isset($_GET['planet'])) { if(!empty($_GET['planet'])) { $selectedPlanet = $_GET['planet']; } } ?>
<?php if(!in_array($selectedPlanet,$ListofPlanets)){$selectedPlanet ="Earth";} ?>

<section class="spinninPlanet-Container">
    <div id="spinninPlanet-planet">
         <img id="spinninPlanet-planet-img" src="./image/<?php echo $selectedPlanet; ?>.png" />
    </div>
</section>

<section id="planetInfo-container">
    <div id="planetInfo-infoBox">
        <h1 id="planetInfo-header"></h1>
        <p id="planetInfo-info"></p>
    </div>
</section>
