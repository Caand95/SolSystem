<?php //Snask
    include "./Scripts/tmpGetInfo.php";

$list = json_decode(json_encode(array("Elements" => array()), FALSE));
$list->Elements = json_decode(json_encode(GetTestInfo()), FALSE);

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
