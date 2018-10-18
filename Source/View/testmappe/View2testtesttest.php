<?php //IMPORT ?>
<?php require_once "./Scripts/LoadCelestialElements.php"; ?>
<?php require_once "./Scripts/LoadPlanets.php"; ?>
<?php 
$selectedPlanet="";
    
if(isset($_GET['planet'])) { 
    if(!empty($_GET['planet'])) { 
        foreach ($ListofPlanets as $Planet) {
            if ($_GET['planet'] == $Planet->name) {
                $selectedPlanet = $_GET['planet'];
                break;
            } else {
                $selectedPlanet = "Jorden";
            }
        }
    }
}

$planetFacts = $PlanetController->getPlanetFacts($selectedPlanet);
echo "<script>\n";
echo "var facts = JSON.parse(\"" . json_encode($planetFacts, JSON_FORCE_OBJECT) . "\");\n";
echo "/*";
//$json = json_encode($planetFacts[0]->planetName, false);
// echo $json;
// echo json_encode($planetFacts, JSON_FORCE_OBJECT);
echo "*/\n";
echo "</script>\n";
?>
    
<section class="Planet-container">
    <div class="Planet-spinninPlanet">
        <img class="Planet-spinninPlanet-img" src="./image/<?php echo $selectedPlanet; ?>.png" />
    </div>
    <div class="Planet-Facts">
        <div class="Planet-Facts-Box sveav-ani-rev">
            <span class="Planet-Facts-Box-Text"></span>
            <div class="speech-bubble-ds-arrow"></div>
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
