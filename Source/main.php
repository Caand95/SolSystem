<?php
//Content
if (empty($_GET['page']) || $_GET['page'] == "Forside") 
{
    include "View/ViewDefault.php";
} 
else if (!empty($_GET['page'])) 
{
    include "View/".$_GET['page'].".php";
}
else 
{
	print "404";
}
?>
