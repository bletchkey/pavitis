<?php
	include '../includes/dbh.inc.php';
	include '../includes/functions.php';
	include 'filter.php';
	session_start();
?>

<html>
<head>
<meta charset="UTF-8">
<title>Registro Online</title>
<link rel="shortcut icon" href="../img/itis.ico">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="../css/style_onlineregister.css" rel="stylesheet" type="text/css">
<link href="../css/hover.css" rel="stylesheet" media="all">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all"-->
</head>
<header>
	<?php 	if($_SESSION["id_doc"] == '') {
				//header('Location: ../includes/err.php');

				echo"<script>";
				echo"alert('Sessione scaduta, riavviare il programma');";
				echo 'window.location= "../index.php"';
				echo"</script>";

			} ?>
	<h1 class="main-title-top">Docenti</h1>

		<div class="box-name-menu">
		<?php
			$dbconn = mysqli_connect('localhost', 'root','');
			mysqli_select_db($dbconn, 'my_pavitis');

			$ses_var_doc = $_SESSION["id_doc"];

			$result = mysqli_query($dbconn, "SELECT * FROM dataDoc WHERE id_accountDoc = '$ses_var_doc' ");

			if (mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);

				$nome = $row['nome'];
				$cognome = $row['cognome'];
			}
				$id_foto = $ses_var_doc;
				$path_foto = "../foto_doc/".$id_foto.".jpg";

				if(isset($_SESSION['id_doc'])){
				if (file_exists($path_foto)) {
					echo "<div class='cont-info-header'>
						<a href='../regpages_doc/datiregdoc.php'><img src='../foto_doc/".$id_foto.".jpg' class='foto_profilo'></a>
						<div class='cont-name-info-adm-doc'>
						Docente:&nbsp<div class='container-name'><label class='name'>".$nome."</label>&nbsp<label class='name'>".$cognome."</label></div><br>
						</div>
						</div>
						<br>
						<br>
					";
				} else {
					echo "<div class='cont-info-header'>
						<img src='../img/registro_img/user.png' class='foto_profilo2'>
						<div class='cont-name-info-adm-doc'>
						Docente:&nbsp<div class='container-name'><label class='name'>".$nome."</label>&nbsp<label class='name'>".$cognome."</label></div><br>
						</div>
						</div>
						<br>
						<br>
					";

			}
			}
		?>

		<!--span class="menu" id="menu_id" onclick="opencloseNav()">&#9776; MENU</span-->

		<span class="menu">
		<div class="container_menu" style="padding-bottom:10px;" onclick="myFunction(this)">
			<div style="left:44px;top:245px;position:fixed;font-size:20px;">
			 <p id="txt_menu_doc">MENU</p>
			</div>
		  <div class="bar1"></div>
		  <div class="bar2"></div>
		</div>
		</span>

		<div id="mySidenav" class="topnav">
			<br>
			<label class="desc-elem">SERVIZI</label><br><br>
			<a class="tooltips" href="indexregdoc.php"><img class="dim" src="../img/registro_img/home.png"><span>Home</span></a>
			<a class="tooltips" href="datiregdoc.php"><img class="dim" src="../img/registro_img/dati.png"><span>Dati anagrafici</span></a>
			<a class="tooltips" href="ins_voto_individuale.php"><img class="dim" src="../img/registro_img/voti_s.png"><span>Inserisci voto singolo</span></a>
			<!--a class="tooltips" href="ins_voto.php"><img class="dim" src="../img/registro_img/voti.png"><span>Inserisci voti</span></a-->
			<a class="tooltips" href="visual_voti.php"><img class="dim" src="../img/registro_img/voti_v.png"><span>Visualizza voti</span></a>
			<a class="tooltips" href="nota.php"><img class="dim" src="../img/registro_img/ins_nota.png"><span>Inserisci nota disciplinare</span></a>
			<a class="tooltips" href="visual_nota.php"><img class="dim" src="../img/registro_img/visual_nota.png"><span>Visualizza note disciplinari</span></a>
			<a class="tooltips" href="ass_comp1.php"><img class="dim" src="../img/registro_img/compiti.png"><span>Assegna compiti</span></a>
			<a class="tooltips" href="visual_compiti1.php"><img class="dim" src="../img/registro_img/compiti2.png"><span>Visualizza compiti assegnati</span></a>
			<a class="tooltips" href="orari_doc.php"><img class="dim" src="../img/registro_img/clock.png"><span>Orari</span></a>
			<a class="tooltips" href="documenti_doc.php"><img class="dim" src="../img/registro_img/document.png"><span>Carica documenti</span></a>
			<a class="tooltips" href="visual_documenti_doc.php"><img class="dim" src="../img/registro_img/folder.png"><span>Visualizza documenti</span></a>
			<a class="tooltips" href="../includes/userLogout.php"><img class="dim" src="../img/registro_img/esci.png"><span>Esci</span></a><br><br><br>
			<label class="desc-elem">UTILITA'</label><br><br>
			<a class="tooltips" href="change_psw_doc.php"><img class="dim" src="../img/registro_img/key.png"><span>Cambia pw</span></a>
		</div>

	</div>

	<!--script>

		/* Set the height of the side navigation to 0 */
		function closeNav() {
			document.getElementById("mySidenav").style.height = "0px";
		}


	function opencloseNav() {
        if(document.getElementById("mySidenav").style.height != "0px")
			document.getElementById("mySidenav").style.height = "0px";
        else
		document.getElementById("mySidenav").style.height = "300px";
		}
	</script-->
	<script>
	function myFunction(x) {
		if(document.getElementById("mySidenav").style.height == "300px"){
			document.getElementById("mySidenav").style.height = "0px";
            x.classList.toggle("change");
			document.getElementById("txt_menu_doc").innerHTML = "MENU";
        }else{
		document.getElementById("mySidenav").style.height = "300px";
		x.classList.toggle("change");
		document.getElementById("txt_menu_doc").innerHTML = "CHIUDI";
        }
	}
	</script>
</header>

<body id="bodydoc-id">
