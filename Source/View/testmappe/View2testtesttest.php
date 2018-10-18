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
$jsontmp = json_encode($planetFacts, false);
?>

<script>
    var facts = JSON.parse('<?php print_r($jsontmp);?>');
    var currentFactNumber = 1;
    function DisplayFact(){
        var textframe = document.getElementById('Planet-Facts-Box-Text');
        currentFactNumber++;
        if(currentFactNumber >= facts.length){
            currentFactNumber = 0;
        }
        textframe.innerText  = facts[currentFactNumber]['fact'];
    /*    facts.forEach(function(element) {
  console.log(element['fact']);
})*/
        console.log(facts[currentFactNumber]['fact']);
        
    }
</script>

    
<section class="Planet-container">
    <div class="Planet-spinninPlanet">
        <img class="Planet-spinninPlanet-img" src="./image/<?php echo $selectedPlanet; ?>.png" />
    </div>
    <div class="Planet-Facts">
        <div class="Planet-Facts-Box sveav-ani-rev">
            <span id="Planet-Facts-Box-Text"><?php echo json_decode($jsontmp)[1]->fact;?></span>
            <button class="btn btn-secondary Planet-Facts-Box-Btn" onclick="DisplayFact()">Næste Fakta!</button>
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
