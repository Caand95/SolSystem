<?php require_once "./Scripts/LoadShowPlanets.php"; ?>
<?php require_once "./Scripts/LoadPlanets.php"; ?>
<section class="element-solsystem">
    <!-- JAVASCRIPT -->
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

                console.log('Name=%s, Angle=%d, x=%s, y=%s', name, Planet.a * 1000, "" + Planet.x + "", "" + Planet.y + "");

            }, 10);
        }

    </script>
    <div id="Sol" class=element style="Left:-30; Bottom:-30; Height:60; Width:60; background-color:Orange;"></div>

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
