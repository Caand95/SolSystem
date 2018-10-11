<?php
//function der laver/henter information
function GetInfo(){
    return array(
            "Sol" => array(
                "name" => "Sol",
                "size" => 60,
                "speed" => 0,
                "distance" => 1,
                "hasRings" => "false",
                "color" => "orange"
              ),
            "Earth" => array(
                "name" => "Earth",
                "size" => 20,
                "speed" => 6,
                "distance" => 60,
                "hasRings" => "false",
                "color" => "blue"
            ),
            "Mars" => array(
                "name" => "Mars",
                "size" => 15,
                "speed" => 50,
                "distance" => 25,
                "hasRings" => "false",
                "color" => "red"
            ),
            "Pluto" => array(
                "name" => "Pluto",
                "size" => 30,
                "speed" => 4,
                "distance" => 100,
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
      echo    "Height:".($Element->size).";\n";
      echo    "Width:".($Element->size).";\n";
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
        
        var px = ((solsize/2)+distance) * Math.cos(a);
        var py = ((solsize/2)+distance) * Math.sin(a);
        
        document.getElementById(name).style.left=(px-(size/2));
        document.getElementById(name).style.bottom=(py-(size/2));
    } 


    </script>

    <!-- PHP - running the animation -->
    <script>
    <?php
    foreach($list->Elements as $Element){
        if($Element->name != "Sol"){
    /*  echo "<script>      FloatInCircle(\"".          $Element->name.          "\",\"".          $Element->distance.          "\",\"".          $list->Elements->Sol->distance.          "\",\"".          $Element->speed.          "\",\"".          $Element->size.          "\");      </script>";*/
        echo "
        var a = $Element->speed;
        setInterval(function() { a=(a + Math.PI / 360) % (Math.PI * 2);
  Orbit(a, \"$Element->name\", $Element->distance, ".(($list->Elements->Sol->size/2)).", $Element->speed, $Element->size);}, 1);";
    }
        }
    ?>
    </script>
</section>
