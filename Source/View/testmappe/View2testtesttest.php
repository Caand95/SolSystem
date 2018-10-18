<?php //IMPORT ?>
<?php require_once "./Scripts/LoadCelestialElements.php"; ?>
<?php require_once "./Scripts/LoadPlanets.php"; ?>
<?php //Snask ?>
<?php $selectedPlanet="";if(isset($_GET['planet'])) { if(!empty($_GET['planet'])) { $selectedPlanet = $_GET['planet']; } } ?>
<?php /*Virker ikke*/ if(in_array($selectedPlanet,$ListofPlanets)){$selectedPlanet ="Earth";} ?>

<section class="Planet-container">
    <div class="Planet-spinninPlanet">
        <img class="Planet-spinninPlanet-img" src="./image/<?php echo $selectedPlanet; ?>.png" />
    </div>
    <div class="Planet-Facts">
        <div class="Planet-Facts-Box sveav-ani-rev">
            <span class="Planet-Facts-Box-Text"></span>
        </div>
        <img class="Planet-Facts-astro sveav-ani" src="./image/astronaut.png" />
    </div>
</section>
<script>
    function GoBack() {
        window.location.href = "?page=";
    }
</script>
<section id="rejs-container-rev">
    <img id="rejs-racket-back" src="./Image/Racket-rev.png" />
    <button class="btn btn-secondary" id="rejs-knap" onclick="GoBack()">
        Flyv tilbage til SolSystemet!
    </button>
</section>

<!--unused-->
<!--<section class="planetInfo-container d-flex justify-content-center align-items-center">
    <div class="planetInfo-infoBox">
        <h1 class="planetInfo-header"></h1>
        <p class="planetInfo-info"></p>
    </div>
</section>-->
