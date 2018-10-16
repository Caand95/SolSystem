<?php //LoadCelestialElements
    require_once "./Controller/CelestialElementController.php";
    if(!isset($CelestialElementController)){
        $CelestialElementController  = new CelestialElementController();
    }
    if(!isset($ListofCelestialElements)){
        $ListofCelestialElements = $CelestialElementController->getCelestialElements();
    }
?>