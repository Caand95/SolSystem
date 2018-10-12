<?php
//function der laver/henter information
function GetInfo(){
    return array(
            "Sol" => array(
                "name" => "Sol",
                "size" => 50,
                "speed" => 0,
                "distance" => 0,
                "hasRings" => "false",
                "color" => "yellow"
              ),
            "Mercury" => array(
                "name" => "Mercury",
                "size" => 29.00,
                "speed" => 88,
                "distance" => 43.3,
                "hasRings" => "false",
                "color" => "darkorange"
            ),
        "Venus" => array(
                "name" => "Venus",
                "size" => 76.00,
                "speed" => 255,
                "distance" => 67.6,
                "hasRings" => "false",
                "color" => "orange"
        ),
            "Earth" => array(
                "name" => "Earth",
                "size" => 79.13,
                "speed" => 365,
                "distance" => 94.4,
                "hasRings" => "false",
                "color" => "blue"
            /*),

            "Pluto" => array(
                "name" => "Pluto",
                "size" => 36.00,
                "speed" => 248,
                "distance" => 4600,
                "hasRings" => "false",
                "color" => "darkgrey"
            */)
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
      border:solid 0px transparent !important;
      border-radius: 500px;
    }
<?php
  foreach($list->Elements as $Element){
      echo "\n#".$Element->name."{\n";
      echo    "Height:".($Element->size/2).";\n";
      echo    "Width:".($Element->size/2).";\n";
      echo    "background-color:".$Element->color.";\n";

      if($Element->name == "Sol"){
          echo    "Bottom:-".($Element->size/2).";\n";
          echo    "Left:-".($Element->size/2).";\n";
      }
    echo "}";
  }?>
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
    function FloatInCircle(name, x,y, speed, size) {
      if(name != "Sol"){
          
      setInterval(function(angle){

        var element = document.getElementById(''+name+'');
      //  var w = size/2;
        //var h = size/2;

        //x = w * Math.cos((Date.now()%60000)/38000 * Math.PI * speed) * (size/2) ;
        //y = (h * Math.sin((Date.now()%60000)/38000 * Math.PI * speed) * (size/2))/2;
         
          
          
        document.getElementById(name).style.left=x;
        document.getElementById(name).style.bottom=y;

      }, 5);
      }

    }
        
    function Orbit(a,name,distance,solsize, speed, size){
        
        var px = (((solsize/2)+distance+(size/2)) * Math.cos(a));
        var py = (((solsize/2)+distance+(size/2)) * Math.sin(a) );
        
        document.getElementById(name).style.left=px;
        document.getElementById(name).style.bottom=py;
    } 


    </script>

    <!-- PHP - running the animation -->
    <script>
    <?php
    foreach($list->Elements as $Element){
        if($Element->name != "Sol"){
    /*  echo "<script>      FloatInCircle(\"".          $Element->name.          "\",\"".          $Element->distance.          "\",\"".          $list->Elements->Sol->distance.          "\",\"".          $Element->speed.          "\",\"".          $Element->size.          "\");      </script>";*/
        echo "
            var $Element->name = ($Element->speed/300);
    
        setInterval(function() { $Element->name=($Element->name + Math.PI / 360) % (Math.PI * 2);
            
        Orbit($Element->name, \"$Element->name\", ".($Element->distance).", ".(($list->Elements->Sol->size)).", $Element->speed, ".($Element->size/2).");}, 1);";
    }
        }
    ?>
    </script>
</section>
