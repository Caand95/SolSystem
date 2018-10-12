<?php
function GetInfo(){
    return array(
            "Sol" => array(
                "name" => "Sol",
                "size" => 69.6,
                "speed" => 0,
                "distance" => 0,
                "color" => "#ffbf4b"
              ),
        "Mercury" => array(
                "name" => "Mercury",
                "size" => 29,
                "speed" => 29.7,
                "distance" => 43.3,
                "color" => "#babafb"
            ),
        "Venus" => array(
                "name" => "Venus",
                "size" => 76,
                "speed" => 67.6,
                "distance" => 21.7,
                "color" => "#ff8100"
            ),
            "Earth" => array(
                "name" => "Earth",
                "size" => 79.13,
                "speed" => 18.5,
                "distance" => 94.4,
                "color" => "#1e8ede"
            ),
            "Mars" => array(
                "name" => "Mars",
                "size" => 42,
                "speed" => 15,
                "distance" => 154.7,
                "color" => "#dc3333"
            ),
            "Jupiter" => array(
                "name" => "Jupiter",
                "size" => 868,
                "speed" => 8.1,
                "distance" => 506.7,
                "color" => "#a5632a"
            ),
        "Saturn" => array(
                "name" => "Saturn",
                "size" => 715,
                "speed" => 6,
                "distance" => 936,
                "color" => "#fde4c2"
            ),
        "Uranus" => array(
                "name" => "Uranus",
                "size" => 294,
                "speed" => 4.2,
                "distance" => 1867,
                "color" => "#45caca"
            ),
        "Neptune" => array(
                "name" => "Neptune",
                "size" => 280,
                "speed" => 3.4,
                "distance" => 2817,
                "color" => "#3aa5a5"
            ),
        "Pluto" => array(
                "name" => "Pluto",
                "size" => 36,
                "speed" => 3,
                "distance" => 4600,
                "hasRings" => "false",
                "color" => "#8e8585"
            )
        );
}

$list = json_decode(json_encode(array("Elements" => array()), FALSE));
$list->Elements = json_decode(json_encode(GetInfo()), FALSE);
?>


<!-- CSS - info fra php -->
<style>
    .element-solsystem {
        position: absolute;
        top: 50%;
        bottom: 50%;
        left: 50%;
        right: 50%;
    }

    .element {
        position: absolute;
        border: solid 1px transparent !important;
        border-radius: 500px;
    }

    <?php foreach($list->Elements as $Element) {
        echo "\n#".$Element->name."{\n";
        echo "Height:".($Element->size).";\n";
        echo "Width:".($Element->size).";\n";
        echo "background-color:".$Element->color.";\n";

        if($Element->name=="Sol") {
            echo "Bottom:".((-1*($Element->size/2))).";\n";
            echo "Left:".((-1*($Element->size/2))).";\n";
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
        echo"<div id=\"".$Element->name."\" class=\"element\"></div>";
    }
    ?>

    <!-- JAVASCRIPT -->
    <script>
        function FloatInCircle(name, mod, speed, size, distance) {
            if (name != "Sol") {
                setInterval(function() {
                    var element = document.getElementById(name);
                    var sunsize = document.getElementById("Sol");

                    var w = size;
                    var h = size;
                    //x = Math.cos(angle * Math.PI / 180);
                    //y = Math.sin(angle * Math.PI / 180);
                    var planetOrbitx = ((sunsize.style.width/2)+distance+(size/2));
                    var planetOrbity = ((sunsize.style.height/2)+distance+(size/2));
                    
                    var x = (Math.cos(mod)*distance);
                    var y = (Math.sin(mod)*distance);
                    mod++;
                    if(mod > (Math.PI * 10000)){
                        mod = 0;
                    }
                    document.getElementById(name).style.left = x;
                    document.getElementById(name).style.bottom = y;
                }, 10000);
            }
        }

    </script>

    <!-- PHP - running the animation -->
    <?php
    foreach($list->Elements as $Element){
      echo "<script>var $Element->name = 0;
        FloatInCircle(\"".$Element->name."\",".$Element->name.",\"".$Element->speed."\",\"".$Element->size."\",\"$Element->distance\");
      </script>";
    }
    ?>
</section>
