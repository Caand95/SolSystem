<?php
function GetInfo(){
    return array(
            "Sol" => array(
                "name" => "Sol",
                "size" => 59.6,
                "speed" => 0,
                "position" => 0,
                "hasRings" => "false",
                "color" => "orange"
              ),
        "Mercury" => array(
                "name" => "Mercury",
                "size" => 10,
                "speed" => 8,
                "position" => 10,
                "hasRings" => "false",
                "color" => "darkblue"
            ),
        "Venus" => array(
                "name" => "Venus",
                "size" => 15,
                "speed" => 22.5,
                "position" => 14,
                "hasRings" => "false",
                "color" => "green"
            ),
            "Earth" => array(
                "name" => "Earth",
                "size" => 28,
                "speed" => 35.6,
                "position" => 18,
                "hasRings" => "false",
                "color" => "teal"
            ),
            "Mars" => array(
                "name" => "Mars",
                "size" => 15,
                "speed" => 50.3,
                "position" => 22,
                "hasRings" => "false",
                "color" => "red"
            ),
            "Jupiter" => array(
                "name" => "Jupiter",
                "size" => 86.8,
                "speed" => 50.3,
                "position" => 12,
                "hasRings" => "false",
                "color" => "red"
            ),
            "Pluto" => array(
                "name" => "Pluto",
                "size" => 30,
                "speed" => 4,
                "position" => 50,
                "hasRings" => "false",
                "color" => "darkgrey"
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
        function FloatInCircle(name, x, y, speed, size, position) {
            if (name != "Sol") {

                setInterval(function() {

                        var element = document.getElementById('' + name + '');
                        var sunsize = document.getElementById("Sol");
                        var w = size;
                        var h = size;

                        //x = Math.cos(angle * Math.PI / 180);
                        x = position * Math.cos((Date.now() % 60000) / 600000 * Math.PI * speed) * (size / 2);
                        y = (position * Math.sin((Date.now() % 60000) / 600000 * Math.PI * speed) * (size / 2)) / 1.1;
                    //y = Math.sin(angle * Math.PI / 180);

                    document.getElementById(name).style.left = x+sunsize.style.width; 
                    document.getElementById(name).style.bottom = y+sunsize.style.height;

                }, 10);
        }

        }

    </script>

    <!-- PHP - running the animation -->
    <?php
    foreach($list->Elements as $Element){
      echo "<script>
        FloatInCircle(\"".$Element->name."\",\"".($Element->position/2)."\",\"".($Element->position/2)."\",\"".$Element->speed."\",\"".$Element->size."\",\"$Element->position\");
      </script>";
    }
    ?>
</section>
