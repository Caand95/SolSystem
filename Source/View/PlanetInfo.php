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

<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script>
    var facts = JSON.parse('<?php print_r($jsontmp);?>');
    var currentFactNumber = 0;

    function DisplayFact(){
        currentFactNumber++;
        if(currentFactNumber >= facts.length){
            currentFactNumber = 0;
        }

        //var textframe = document.getElementById('Planet-Facts-Box-Text');
        //textframe.innerText  = facts[currentFactNumber]['fact'];
        var fact = facts[currentFactNumber]['fact'];
        $("#Planet-Facts-Box-Text").text(fact);
        console.log(fact);

        // Play voice.
        if (responsiveVoice.voiceSupport()) {
            responsiveVoice.cancel();
            responsiveVoice.speak(fact, "Danish Female");
        }
    }

    $(document).ready(function() {
        DisplayFact();
    });
</script>

    
<section class="Planet-container">
    <div class="Planet-spinninPlanet">
        <img class="Planet-spinninPlanet-img" src="./image/<?php echo $selectedPlanet; ?>.png" />
    </div>
    <div class="Planet-Facts">
        <div class="Planet-Facts-Box sveav-ani-rev">
            <span id="Planet-Facts-Box-Text"></span>
            <button id="Planet-Facts-Box-Btn" class="btn btn-secondary" onclick="DisplayFact()">Næste Fakta!</button>
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
