<html>
<head>
<title>Sessione scaduta</title>
<link rel="shortcut icon" href="../img/itis.ico">	
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<style>
body{
	background-image: url(../img/registro_img/sfondoregistro.jpg);
    background-repeat: no-repeat;
    background-position: background-position: top left;
    background-size: 100%;
	position: absolute;
    margin: 0;
    overflow: auto;
	padding: 0px;
	left: 0px;
	width: 100%; 
	height: 100%;
}
</style>
<body>
	<?php
	echo"<script>";
	echo"alert('Sessione scaduta, riavviare il programma');";
	echo 'window.location= "../index.php"';
	echo"</script>";
	?>
</body>
</html>


