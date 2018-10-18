<?php //IMPORT ?>
<?php require_once "./Scripts/LoadCelestialElements.php"; ?>
<?php require_once "./Scripts/LoadPlanets.php"; ?>
<?php //Snask ?>
<?php $selectedPlanet="";if(isset($_GET['planet'])) { if(!empty($_GET['planet'])) { $selectedPlanet = $_GET['planet']; } } ?>
<?php /*Virker ikke*/ if(in_array($selectedPlanet,$ListofPlanets)){$selectedPlanet ="Earth";} ?>

<section class="Planet-container">
<div class="Planet-spinninPlanet">
    <img class="spinninPlanet-img" src="./image/<?php echo $selectedPlanet; ?>.png" />
    </div>
    <div class="Planet-Facts"></div>
</section>

<section class="planetInfo-container">
    <div class="planetInfo-infoBox">
        <h1 class="planetInfo-header"></h1>
        <p class="planetInfo-info"></p>
    </div>
</section>
