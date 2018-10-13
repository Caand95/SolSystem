<?php //Snask
    include "./Scripts/tmpGetInfo.php";

$list = json_decode(json_encode(array("Elements" => array()), FALSE));
$list->Elements = json_decode(json_encode(GetTestInfoBig()), FALSE);

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
                }, 1);
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
