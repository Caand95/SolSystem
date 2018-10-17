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
    }?>

</style>

 <!-- Snask -->
    <script>
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

    </script>
<section>
    <!-- View SideBar -->
    <section class="sidenav-nav d-flex flex-column align-items-center">
        <?php
        // sort på nested objects value (Planet->sunDistance)
        usort($ListofPlanets,function($first,$second){return $first->sunDistance > $second->sunDistance;});

        // Print nav-item HTML elementer & kald PlanetHover for hvert element
        foreach($ListofPlanets as $Planet){
            echo"<div id=\"sidenav-item-$Planet->name\" class=\"sidenav-item d-flex justify-content-center align-items-center\" style=\"border: solid 2px $Planet->hexColor;background:".$Planet->hexColor."75;color:$Planet->hexColor !important\">$Planet->name</div>\n";
            echo"<script>HoverGlow(\"sidenav-item-$Planet->name\", \"$Planet->name\", \"golden\");</script>\n";
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
                echo"PlanetOrbit(\"$Planet->name\", $Planet->speed, $Planet->distance,$Planet->radius)\n";
                echo"</script>\n";
            }
        }
    ?>
    </section>
</section>
