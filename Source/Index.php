<html>
	<head>
		<title>SolSytemet</title>
		<meta charset="utf-8">

		<!-- Css -->
        <link rel="stylesheet" type="text/css" href="Css/niceness.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!-- font family -->
        
        
        <!-- FontAwesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">



	</head>
    <body id="b0dy">

	<!-- Header -->
	<header class="header">
	   <a href="?page=Forside">
           <!--<img class="logo" src="Image/logo.png" />-->
           <h1 class="logo-text">SolSystemet</h1> 
        </a>
        <?php include "./navbar.php"; ?>
    </header>

	<!-- Content -->
	<?php
        echo '<div id="b0dy">
                <!--Main-->
                <section class="main">
                ';
        include "./main.php";
		echo '</section>
            </div>';
    ?>

	<!--Footer-->
		<footer>
		</footer>

	</body>
</html>
