<?php require_once "./Scripts/LoadPlanets.php"; ?>
<?php //Snask
    include "./Scripts/tmpGetInfo.php";

$list = json_decode(json_encode(array("Elements" => array()), FALSE));
$list->Elements = json_decode(json_encode(GetTestInfo()), FALSE);

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
    }?>

    .planet-hover {
        -webkit-animation: neon5 1.5s ease-in-out infinite alternate;
        -moz-animation: neon5 1.5s ease-in-out infinite alternate;
        animation: neon5 1.5s ease-in-out infinite alternate;
    }
</style>

 <!-- Snask -->
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

            }, 30);
        }
    }

    function PlanetHover(selectedElement,targetElement) {
        $('#'+selectedElement).hover(
            function(){ $('#'+targetElement).addClass('planet-hover'); console.log('Hover '+targetElement); },
            function(){ $('#'+targetElement).removeClass('planet-hover'); console.log('Unhover '+targetElement); });
    }
</script>
<section>
    <!-- View SideBar -->
    <section class="sidenav-nav">
        <?php
        // sort på nested objects value (Planet->sunDistance)
        usort($ListofPlanets,function($first,$second){return $first->sunDistance > $second->sunDistance;});

        // Print nav-item HTML elementer & kald PlanetHover for hvert element
        foreach($ListofPlanets as $Planet){
            echo"<div id=\"sidenav-item-$Planet->name\" class=\"sidenav-item d-flex justify-content-center\">$Planet->name</div>\n";
            echo"<script>PlanetHover(\"sidenav-item-$Planet->name\", \"$Planet->name\");</script>\n";
        }

        // Kald PlanetHover for hvert nav-item element
        // foreach($ListofPlanets as $Planet){
        //    echo"<script>PlanetHover(\"sidenav-item-$Planet->name\", \"$Planet->name\");</script>\n";
        //}
        ?>
    </section>
<!-- View Content -->
    <section class="element-solsystem">
        <?php
        // Print planet HTML elementer
        foreach($list->Elements as $Element){
            echo"<div id=\"".$Element->name."\" class=\"element\"></div>";
        }
        ?>

        <!-- PHP - running the animation -->
        <?php
        foreach($list->Elements as $Element){
            echo "<script>
                FloatInCircle(\"".$Element->name."\",\"".($Element->position/2)."\",\"".($Element->position/2)."\",\"".$Element->speed."\",\"".$Element->size."\",\"$Element->position\");
            </script>";
        }
        ?>
    </section>
</section>
