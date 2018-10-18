<?php require_once "./Scripts/LoadCelestialElements.php"; ?>
<?php require_once "./Scripts/LoadPlanets.php"; ?>
<?php
$planetFacts = $PlanetController->getPlanetFacts('Jorden');
$jsontmp = json_encode($planetFacts, false);
echo "<pre style=\"height:100%;position:absolute;background-color:white;top:6%;\">";
    print_r(json_decode($jsontmp));
    /*print_r($jsontmp);*/
echo "</pre>";

echo"<script>";
echo"var facts = JSON.parse(\'";
print_r($jsontmp);
echo "\');\n";
echo"</script>";

?>