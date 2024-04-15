<?php
	include 'includes/dbh.inc.php';
	include 'includes/functions.php';
	session_start();
?>

<html>
<head>
<meta charset="UTF-8">
<title>ITIS Galileo Galilei</title>
<link rel="shortcut icon" href="img/itis.ico">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="css/style-sito-web-itis.css" rel="stylesheet" type="text/css">
<script src="../js/login_forms_scripts.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="css/hover.css" rel="stylesheet" media="all">
<link href="css/lightbox.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
</head>

<body>
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
<!--HEADER id="#nav-top"-->
<header id="nav-top">
	<!--span class="container" onclick="opencloseNav()">&#9776;</span-->
	<span class="menu">
	 <div class="container" style="padding-bottom:10px;" onclick="myFunction(this)">
		  <div class="bar1"></div>
		  <div class="bar2"></div>
		</div>
		</span>
	<div id="mySidenav" class="sidenav">
	<a href="index.php" class="hvr-bounce-to-right">Home</a>
	<a href="info_scuola.php" class="hvr-bounce-to-right">La nostra scuola</a>
	<a href="galileo_galilei.php" class="hvr-bounce-to-right">Galileo Galilei</a>
	<a href="strutture.php" class="hvr-bounce-to-right">Le strutture</a>
	<a href="gallery.php" class="hvr-bounce-to-right">Gallery</a>
	<a href="dove_siamo.php" class="hvr-bounce-to-right">Dove siamo</a>
	<a href="contatti.php" class="hvr-bounce-to-right">Contattaci</a>
	<a href="informatico.php" class="hvr-bounce-to-right">Informatico</a>
	<a href="economico.php" class="hvr-bounce-to-right">Amministrazione Finanza e Marketing</a>
	<a href="agrario.php" class="hvr-bounce-to-right">Agroindustriale</a>
	<a href="linguistico.php" class="hvr-bounce-to-right">Relazioni Internazionali</a>
	<a id="logmodalstud_sidenav" class="hvr-bounce-to-right">Accedi come Genitore-Studente</a>
	<a id="logmodaldoc_sidenav" class="hvr-bounce-to-right">Accedi come Docente</a>
	<a id="logmodaladm_sidenav" class="hvr-bounce-to-right">Accedi come Amministratore</a>
	</div>
	<div class="wrapper">
	<nav>
	<ul class="main-nav">
	<li class="dropdown">
	<a href="index.php" class="hvr-underline-from-center">Home</a>
	<div class="dropdown-content">
	<a href="info_scuola.php" class="hvr-bounce-to-left">La nostra scuola</a>
	<a href="galileo_galilei.php" class="hvr-bounce-to-left">Galileo Galilei</a>
	<a href="strutture.php" class="hvr-bounce-to-left">Le strutture</a>
	</div>
	</li>
	<li class="dropdown">
	<a href="javascript:void(0)" class="hvr-underline-from-center">Indirizzi</a>
	<div class="dropdown-content">
	<a href="informatico.php" class="hvr-bounce-to-left">Informatico</a>
	<a href="economico.php" class="hvr-bounce-to-left">Amministrazione Finanza e Marketing</a>
	<a href="agrario.php" class="hvr-bounce-to-left">Agroindustriale</a>
	<a href="linguistico.php" class="hvr-bounce-to-left">Relazioni Internazionali</a>
	</div>
	</li>
	<li><a href="gallery.php" class="hvr-underline-from-center">Gallery</a></li>
	<li><a href="dove_siamo.php" class="hvr-underline-from-center">Dove siamo?</a></li>
	<li><a href="contatti.php" class="hvr-underline-from-center">Contattaci</a></li>
	<li class="dropdown">
	<a href="javascript:void(0)" class="hvr-underline-from-center">Registro elettronico</a>
	<div class="dropdown-content">
	<a id="logmodalstud" class="hvr-bounce-to-left">Genitori-Studenti</a>
	<a id="logmodaldoc" class="hvr-bounce-to-left">Docenti</a>
	<a id="logmodaladm" class="hvr-bounce-to-left">Amministratori</a>
	</div>
	</li>
	</ul>
	</nav>
	</div>

		<script>
	function myFunction(x) {
		if(document.getElementById("mySidenav").style.width =="100%"){
			document.getElementById("mySidenav").style.width = "0";
            x.classList.toggle("change");
        }else{
		document.getElementById("mySidenav").style.width = "100%";
		x.classList.toggle("change");
        }
	}
	</script>
	<script>
		function opencloseNav() {
        if(document.getElementById("mySidenav").style.width =="100%")
			document.getElementById("mySidenav").style.width = "0";
        else
        document.getElementById("mySidenav").style.width = "100%";
		}

	</script>

	<script>
		$(window).scroll(function() {
		if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
			$('#return-to-top').fadeIn(200);    // Fade in the arrow
		} else {
			$('#return-to-top').fadeOut(200);   // Else fade out the arrow
		}
	});
	$('#return-to-top').click(function() {      // When arrow is clicked
		$('body,html').animate({
			scrollTop : 0                       // Scroll to top of body
		}, 500);
	});
	</script>

</header>

