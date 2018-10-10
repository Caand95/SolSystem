<?php
function GetInfo(){
    return array(
            "Sol" => array(
                "name" => "Sol",
                "x" => "1",
                "y" => "1",
                "size" => "50",
                "speed" => "0",
                "hasRings" => "0",
                "color" => "orange"
            ),
            "Earth" => array(
                "name" => "Earth",
                "x" => "-50",
                "y" => "-30",
                "size" => "20",
                "speed" => "4",
                "hasRings" => "true",
                "color" => "blue"
            ),
            "Mars" => array(  
                "name" => "Mars",
                "x" => "20",
                "y" => "20",
                "size" => "10",
                "speed" => "5",
                "hasRings" => "false",
                "color" => "red"
            )
        );
}

$list = json_decode(json_encode(array("Elements" => array()), FALSE));
$list->Elements = json_decode(json_encode(GetInfo()), FALSE);
?>


<!-- CSS - info fra php -->
<style>
    .element-solsystem{
        position:absolute;
        top:50%;
        bottom:50%; 
        left:50%;
        right:50%;
    }
    .element{
        position:absolute;
        border:solid 1px transparent !important;
        border-radius: 500px;
        
    }
    <?php
    foreach($list->Elements as $Element){
            
        echo ".element-".$Element->name."{\n";
        echo    "Height:".($Element->size).";\n";
        echo    "Width:".($Element->size).";\n";
        echo    "background-color:".$Element->color.";\n";
            
        if($Element->name != "Sol"){
            if($Element->y < 0){
                echo    "Bottom:-".( ($list->Elements->Sol->size/2) + (-1*($Element->y)) + ($Element->size/2) ).";\n";
            } 
            else 
            {
                echo    "Bottom:".( ($list->Elements->Sol->size/2) + ($Element->y) + ($Element->size/2) ).";\n";
            }
            if($Element->x < 0){
                echo    "Left:-".( ($list->Elements->Sol->size/2) + (-1*($Element->x)) + ($Element->size/2) ).";\n";
            } 
            else 
            {
                echo    "Left:".( ($list->Elements->Sol->size/2) + ($Element->x) + ($Element->size/2) ).";\n";
            }
        } 
        else 
        {
            echo    "Bottom:".((-1*($Element->size/2)) ).";\n";
            echo    "Left:".((-1*($Element->size/2)) ).";\n";
        }
        echo "}";
        }
    ?>
</style>

<!-- HTML -->
<section class="element-solsystem">

    <!-- PHP -->
    <?php
    foreach($list->Elements as $Element){
        echo"<div class=\"element element-".$Element->name."\"></div>";
    }
    ?>
</section>


<!-- JAVASCRIPT -->



