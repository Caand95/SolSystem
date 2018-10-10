<?php
$url = 'http://' . $_SERVER['HTTP_HOST'];
$url .= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$tmp = explode(@"/", $url);
$url = $tmp[0].'//'.$tmp[1].$tmp[2].'/'.$tmp[3].'/'; //developer path
if(explode(@".",explode(@"/",$_SERVER['PHP_SELF'])[3])[0] != "redirect"){
    // check hvis man er på redirect siden men ikke include/required
    header('Location: ' . $url, true, 302);
}
else
{
    echo $_SERVER['HTTP_HOST']; // localhost:44380
    echo "<br>";
    echo $_SERVER['PHP_SELF'];  // Apaché_testweb/scripts/redirect.php
    echo "<br>";
    echo $url;                  // http://localhost:44380/Apache-testweb/
    echo "<br>";
}
?>
