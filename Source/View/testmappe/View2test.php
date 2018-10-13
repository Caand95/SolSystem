<?php //Snask
    include "./Scripts/tmpGetInfo.php";

$list = json_decode(json_encode(array("Elements" => array()), FALSE));
$list->Elements = json_decode(json_encode(GetTestInfo()), FALSE);

?>





<section class="WheelView">

<div class="entry" id="ActiveEntry"></div>



</section>

<section id="WheelInfo">
    <div id="WheelInfoBox">
        <h1 id="ActiveEntryHeader"></h1>
        <p id="ActiveEntryInfo"></p>
        <p id="ActiveEntryShowMoreAboutElementLink">
            Læs videre omkring 
            <a href="?page=View3&ElementName=<?php echo $Entry->CelestialElementType; ?>">
                <?php echo $Entry->CelestialElementType; ?>...
            </a>
        </p>
    </section>

    <section id="RandomFactWidget">
        <div id="RandomFactDude">
        
        </div>
        
        <div id="RandomFactText">
        
        </div>
    </section>
</section>
