<?php //LoadPlanets
    require_once "./Controller/PlanetController.php";
    if(!isset($PlanetController)){
        $PlanetController  = new PlanetController();
    }
    if(!isset($ListofPlanets)){
        $ListofPlanets = $PlanetController->getPlanets();
    }
?>