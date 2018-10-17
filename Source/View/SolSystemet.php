<?php //REMOVE WHEN VIEW IS DONE
    //include "./View/testmappe/view1.php";
?>
<?php require_once "./Scripts/LoadShowPlanets.php"; ?>
<?php require_once "./Scripts/LoadPlanets.php"; ?>

<!-- CSS - info fra php -->
<style>
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

<!-- Snask -->
<script>
    var currentDestination = null;

    function PlanetOrbit(name, speed, distance, size) {

        var PlanetReference = document.getElementById(name);
        var Reference = document.getElementById("Sol");

        var Planet = {
            r: distance + size / 2,
            a: (Math.random() * 5),
            x: 0,
            y: 0,
            s: (speed * 0.001)
        }

        setInterval(function() {

            Planet.x = Math.cos(Planet.a) * Planet.r;
            Planet.y = Math.sin(Planet.a) * Planet.r;

            Planet.a += Planet.s;
            //PlanetPoint.x += PlanetPoint.d;
            //PlanetPoint.y += PlanetPoint.d;

            PlanetReference.style.left = Planet.x;
            PlanetReference.style.bottom = Planet.y;

            Planet.a += Planet.s;

            //console.log('Name=%s, Angle=%d, x=%s, y=%s', name, Planet.a * 1000, "" + Planet.x + "", "" + Planet.y + "");

        }, 16);
    }

    function setDestination(targetDestination) {
        console.log('Destination=%s', "" + targetDestination + "");

        // Fjern forrige planet markering
        if (currentDestination != null) {
            $('#sidenav-item-' + currentDestination).toggleClass('glow-text-white');
            $('#' + currentDestination).toggleClass('glow-box-white');
        }

        // Sæt ny planet markering
        $('#sidenav-item-' + targetDestination).toggleClass('glow-text-white');
        $('#' + targetDestination).toggleClass('glow-box-white');

        // Opdater destination
        currentDestination = targetDestination;
        $('#destination-tekst').text(currentDestination);
    }

</script>
<section>
    <!-- View SideBar -->
    <section class="sidenav-nav d-flex flex-column align-items-center">
        <?php
        // sort på nested objects value (Planet->sunDistance)
        usort($ListofPlanets,function($first,$second){return $first->sunDistance > $second->sunDistance;});

        // Print nav-item HTML elementer & kald PlanetHover for hvert element
        foreach($ListofPlanets as $Planet){
            echo"<div onclick=\"setDestination('$Planet->name');\" id=\"sidenav-item-$Planet->name\" class=\"sidenav-item d-flex justify-content-center align-items-center\" style=\"border: solid 2px $Planet->hexColor;background:".$Planet->hexColor."75;color:$Planet->hexColor !important\">$Planet->name</div>\n";
            echo"<script>HoverGlow(\"sidenav-item-$Planet->name\", \"$Planet->name\", \"box-golden\");</script>\n";
        }

        // Kald PlanetHover for hvert nav-item element
        // foreach($ListofPlanets as $Planet){
        //    echo"<script>PlanetHover(\"sidenav-item-$Planet->name\", \"$Planet->name\");</script>\n";
        //}
        ?>
    </section>
    <!-- View Content -->
    <section class="element-solsystem" style="">
        <div id="Sol" class="element"></div>
        <?php
    
        foreach($ListofShowPlanets->Elements as $Planet){
            /*PlanetConfig*/
            foreach($ListofPlanets as $RealPlanets){
             if($RealPlanets->name == $Planet->name){
                 $Planet->color = $RealPlanets->hexColor;
             }  
            }
            /*Div as planet element*/
            echo"<div ".
                "id=\"$Planet->name\" ".
                "class=\"element\"".
                "onclick=\"setDestination('$Planet->name');\"".
                "style=\"".
                    "Left:0;".
                    "Bottom:0;".
                    "background-color:$Planet->color;";
            if(($Planet->radius*2) > 50){
            echo    "height:".($Planet->radius).";".
                    "width:".($Planet->radius).";";
            } else {
            echo    "height:".($Planet->radius*4).";".
                    "width:".($Planet->radius*4).";";
            }
            
            echo    "\"></div>\n";
                
            if($Planet->name != "Sol"){
                /*Script for running the javascript*/
                echo"<script>\n";
                echo"PlanetOrbit(\"$Planet->name\", $Planet->speed, $Planet->distance,$Planet->radius);\n";
                echo"HoverGlow(\"$Planet->name\", \"$Planet->name\", \"box-golden\");\n";
                echo"</script>\n";
            }
        }
    ?>
    </section>
    <section id="rejs-container">
        <button class="btn btn-secondary" id="rejs-knap">
                Rejs til <span id="destination-tekst"></span>!
        </button>
            <img id="rejs-racket" src="./Image/Racket.png" />
    </section>
</section>
