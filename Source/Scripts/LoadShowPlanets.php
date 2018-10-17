<?php
function GetShowElements(){
 $planets = array(
        "Merkur" => array(
            "name"=>"Merkur", 
            "radius"=>2.43964, 
            "distance"=>57.909175, 
            "speed"=>0.9, 
            "color"=>"blue"
        ),
        "Venus" => array(
            "name"=>"Venus", 
            "radius"=>6.05159, 
            "distance"=>108.208930, 
            "speed"=>0.8, 
            "color"=>"purple"
        ),
        "Jorden" => array(
            "name"=>"Jorden",
            "radius"=>6.37815,
            "distance"=>149.598262,
            "speed"=>0.7,
            "color"=>"green"
        ),
        "Mars" => array(
            "name"=>"Mars",
            "radius"=>3.39700,
            "distance"=>227.936640,
            "speed"=>0.6,
            "color"=>"red"
        ),
        "Jupiter" => array(
            "name"=>"Jupiter",
            "radius"=>41.49268,
            "distance"=>278.412010,
            "speed"=>0.05,
            "color"=>"orange"
        ),
        "Saturn" => array(
            "name"=>"Saturn",
            "radius"=>38.26714,
            "distance"=>350.725400,
            "speed"=>0.04,
            "color"=>"grey"
        ),
        "Uranus" => array(
            "name"=>"Uranus",
            "radius"=>15.51118,
            "distance"=>490.3456,
            "speed"=>0.04,
            "color"=>"grey"
        ),
        "Neptun" => array(
            "name"=>"Neptun",
            "radius"=>14.67214,
            "distance"=>593.456,
            "speed"=>0.04,
            "color"=>"grey"
        ),
        "Pluto" => array(
            "name"=>"Pluto",
            "radius"=>1.64,
            "distance"=>630.96,
            "speed"=>0.04,
            "color"=>"grey"
        ),

);     
$list = json_decode(json_encode(array("Elements" => array()), FALSE));
$list->Elements = json_decode(json_encode($planets), FALSE);

    return $list;
}

$ListofShowPlanets = getShowElements();
?>
