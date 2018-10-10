<?php
function GetInfo(){
    return array(
            "Sol" => array(
                "name" => "Sol",
                "size" => 50,
                "speed" => 0,
                "position" => 0,
                "hasRings" => "false",
                "color" => "orange"
              ),
            "Earth" => array(
                "name" => "Earth",
                "size" => 20,
                "speed" => 40,
                "position" => 2,
                "hasRings" => "false",
                "color" => "blue"
            ),
            "Mars" => array(
                "name" => "Mars",
                "size" => 10,
                "speed" => 50,
                "position" => 5,
                "hasRings" => "false",
                "color" => "red"
            ),
            "Pluto" => array(
                "name" => "Pluto",
                "size" => 30,
                "speed" => 4,
                "position" => 1,
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
      border:solid 1px transparent !important;
      border-radius: 500px;
    }
<?php
  foreach($list->Elements as $Element){
      echo "\n#".$Element->name."{\n";
      echo    "Height:".($Element->size).";\n";
      echo    "Width:".($Element->size).";\n";
      echo    "background-color:".$Element->color.";\n";

      if($Element->name == "Sol"){
          echo    "Bottom:".((-1*($Element->size/2)) ).";\n";
          echo    "Left:".((-1*($Element->size/2)) ).";\n";
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
    function FloatInCircle(name, x, y, speed, size) {
      if(name != "Sol"){

      setInterval(function(){

        var element = document.getElementById(''+name+'');
        var w = size;
        var h = size;

        //x = Math.cos(angle * Math.PI / 180);
        x = w * Math.cos((Date.now()%60000)/60000 * Math.PI * speed) * (size/2);
        y = (h * Math.sin((Date.now()%60000)/60000 * Math.PI * speed) * (size/2));
        //y = Math.sin(angle * Math.PI / 180);

        document.getElementById(name).style.left=x;
        document.getElementById(name).style.bottom=y;

      }, 1);
      }

    }


    </script>

    <!-- PHP - running the animation -->
    <?php
    foreach($list->Elements as $Element){
      echo "<script>
        FloatInCircle(\"".$Element->name."\",\"".($Element->position)."\",\"".($Element->position)."\",\"".$Element->speed."\",\"".$Element->size."\");
      </script>";
    }
    ?>
</section>
