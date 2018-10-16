<?php require_once "./Scripts/LoadPlanets.php"; ?>
<section class="element-solsystem">
<!-- JAVASCRIPT -->
<script>
    function PlanetOrbit(name, speed, distance, size) {
        
        var Planet = document.getElementById(name);
        var Reference = document.getElementById("Sol");
        
        var OrbitPoint = {
            X:0,
            Y:0,
            radius:distance,
            angle: 0
        }
        var floatingPoint = {
            x: 0,
            y: 0,
            speed: ((speed*0.0001)/24)
        }

        setInterval(function() {
            floatingPoint.x = OrbitPoint.X + Math.cos(OrbitPoint.angle) * OrbitPoint.radius;
            floatingPoint.y = OrbitPoint.Y + Math.sin(OrbitPoint.angle) * OrbitPoint.radius;
            Planet.style.left = floatingPoint.x;
            Planet.style.bottom = floatingPoint.y;
            OrbitPoint.angle += floatingPoint.speed;
            
            if (OrbitPoint.angle >= 360) {
                OrbitPoint.angle = 0;
            }
            if(name == "Merkur"){
                console.log('Name=%s, Angle=%d, x=%s, y=%s', name, OrbitPoint.angle, ""+floatingPoint.x+"", ""+floatingPoint.y+"");
            }

        }, 10);
    }

</script>
   <div id="Sol" class=element style="Left:-30; Bottom:-30; Height:60; Width:60; background-color:Orange;"></div>
         
    <?php
        foreach($ListofPlanets as $Planet){
            /*PlanetConfig*/
            $PlanetShowSize = ($Planet->kmDiameter/2)/60;
                $PlanetShowSize *=0.5;
            
            /*Div as planet element*/
            echo"<div ".
                "id=\"$Planet->name\" ".
                "class=\"element\" ".
                "style=\"".
                    "Left:$PlanetShowSize;".
                    "Bottom:$PlanetShowSize;".
                    "Height:".($PlanetShowSize).";".
                    "Width:".($PlanetShowSize).";".
                    "background-color:$Planet->hexColor;".
                    "\">$Planet->planetType</div>\n";
            
            if($Planet->name != "Sol"){
                /*Script for running the javascript*/
                $PlanetShowSize*=2.5;
                echo"<script>\n";
                echo"PlanetOrbit(\"$Planet->name\", ".($Planet->orbitalPeriodDays).", $Planet->sunDistance, $PlanetShowSize)\n";
                echo"</script>\n";
            }
        }
    ?>
</section>