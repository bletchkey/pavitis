
<?php
	include '../includes/dbh.inc.php';
	include '../includes/functions.php';
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
	<?php if($_SESSION["id_stud"] == '') {
				//header('Location: ../includes/err.php');

				echo"<script>";
				echo"alert('Sessione scaduta, riavviare il programma');";
				echo 'window.location= "../index.php"';
				echo"</script>";

			} ?>
	<h1 class="main-title-top">Studenti</h1>
	<!--div class="container-top-nav">
	<nav-->
	<!--?php
	if(isset($_SESSION['id'])){
		echo "Alunno:&nbsp<div class='container-name'><ul><li><label class='name'>".$_SESSION['nome']."</label></li>&nbsp";
		echo "<li><label class='name'>".$_SESSION['cognome']."</label></li></ul></div>";
	}
	?-->
		<!--ul>
		  <li><a class="tooltips" href="indexregstud.php"><img class="dim" src="../img/registro_img/home.png"><span>HOME</span></a></li>
		  <li><a class="tooltips" href="datiregstud.php"><img class="dim" src="../img/registro_img/dati.png"><span>DATI ANAGRAFICI</span></a></li>
		  <li><a class="tooltips" href="votiregstud.php"><img class="dim" src="../img/registro_img/voti.png"><span>VOTI</span></a></li>
		  <li><a class="tooltips" href="../includes/userLogout.php"><img class="dim" src="../img/registro_img/esci.png"><span>ESCI</span></a></li>
		</ul>
	</nav>
	</div-->
	<div class="box-name-menu">
		<?php
			$dbconn = mysqli_connect('localhost', 'root','');
			mysqli_select_db($dbconn, 'my_pavitis');

			$ses_var_stud = $_SESSION["id_stud"];

			$result = mysqli_query($dbconn, "SELECT * FROM dataStud WHERE id_accountStud = '$ses_var_stud' ");
			$result_classe = mysqli_query($dbconn, "SELECT * FROM classe INNER JOIN (studenteclasse INNER JOIN accountStud ON (accountStud.id = studenteclasse.studente)) ON (classe.id = studenteclasse.classe) WHERE studenteclasse.studente = '$ses_var_stud' ");
			$result_classe_anno = mysqli_query($dbconn, "SELECT * FROM studenteclasse INNER JOIN accountStud ON (accountStud.id = studenteclasse.studente) WHERE studenteclasse.studente = '$ses_var_stud' ");
			$classe = mysqli_query($dbconn, "SELECT * FROM classe");
			$dataArray = array();


			while($row_c = mysqli_fetch_array($classe)) {
				$dataArray[$row_c['id']] = $row_c['classe'];
			}

			if (mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);

				$nome = $row['nome'];
				$cognome = $row['cognome'];
			}

			if (mysqli_num_rows($result_classe_anno) > 0)
			{
				$row_a = mysqli_fetch_assoc($result_classe_anno);

				$anno = $row_a['anno'];
			}


			if (mysqli_num_rows($result_classe) > 0)
			{
				$row2 = mysqli_fetch_assoc($result_classe);

				$_SESSION["id_classe"] = $row2['id'];
				$classe = $row2['classe'];
				$sezione = $row2['sezione'];
				$indirizzo = $row2['indirizzo'];
			}

			$id_foto = $ses_var_stud;
			$path_foto = "../foto_stud/".$id_foto.".jpg";

			if(isset($_SESSION['id_stud'])){
				if (file_exists($path_foto)) {
					echo "<div class='cont-info-header'>
						<a href='../regpages_stud/datiregstud.php'><img src='../foto_stud/".$id_foto.".jpg' class='foto_profilo'></a>
						<div class='cont-name-info'>
						Alunno:&nbsp<div class='container-name'><label class='name'>".$nome."</label>&nbsp<label class='name'>".$cognome."</label></div><br>
						Classe:&nbsp<div class='container-name'><label class='name'>".$dataArray[$classe]."</label><label class='name'>".$sezione."</label>&nbsp&nbsp<label class='name'>".$indirizzo."</label>&nbsp&nbsp<label class='name'>".$anno."</label>
						</div>
						</div>
						</div>
						<br>
						<br>
					";
				} else {
					echo "<div class='cont-info-header'>
						<img src='../img/registro_img/user.png' class='foto_profilo2'>
						<div class='cont-name-info'>
						Alunno:&nbsp<div class='container-name'><label class='name'>".$nome."</label>&nbsp<label class='name'>".$cognome."</label></div><br>
						Classe:&nbsp<div class='container-name'><label class='name'>".$dataArray[$classe]."</label><label class='name'>".$sezione."</label>&nbsp&nbsp<label class='name'>".$indirizzo."</label>&nbsp&nbsp<label class='name'>".$anno."</label>
						</div>
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
		  <p id="txt_menu">MENU</p>
		  </div>
		  <div class="bar1"></div>
		  <div class="bar2"></div>
		</div>
		</span>
		<div id="mySidenav" class="topnav_s">
			<br>
			<label class="desc-elem">SERVIZI</label><br><br>
			<a class="tooltips" href="indexregstud.php"><img class="dim" src="../img/registro_img/home.png"><span>Home</span></a>
			<a class="tooltips" href="datiregstud.php"><img class="dim" src="../img/registro_img/dati.png"><span>Dati anagrafici</span></a>
			<a class="tooltips" href="votiregstud.php"><img class="dim" src="../img/registro_img/voti_s.png"><span>Voti registro</span></a>
			<a class="tooltips" href="note_disciplinari_stud.php"><img class="dim" src="../img/registro_img/ins_nota.png"><span>Note disciplinari</span></a>
			<a class="tooltips" href="ass_comp_stud.php"><img class="dim" src="../img/registro_img/compiti.png"><span>Compiti assegnati</span></a>
			<a class="tooltips" href="orario_stud.php"><img class="dim" src="../img/registro_img/clock.png"><span>Orario scolastico</span></a>
			<a class="tooltips" href="documenti_stud.php"><img class="dim" src="../img/registro_img/document.png"><span>Documenti</span></a>
			<a class="tooltips" href="../includes/userLogout.php"><img class="dim" src="../img/registro_img/esci.png"><span>Esci</span></a><br><br><br>
			<label class="desc-elem">UTILITA'</label><br><br>
			<a class="tooltips" href="change_psw_stud.php"><img class="dim" src="../img/registro_img/key.png"><span>Cambia pw</span></a>
		</div>

	</div>

	<script>
	function myFunction(x) {
		if(document.getElementById("mySidenav").style.height == "300px"){
			document.getElementById("mySidenav").style.height = "0px";
            x.classList.toggle("change");
			document.getElementById("txt_menu").innerHTML = "MENU";
        }else{
		document.getElementById("mySidenav").style.height = "300px";
		x.classList.toggle("change");
		document.getElementById("txt_menu").innerHTML = "CHIUDI";
        }
	}
	</script>

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

	<!--script type="text/javascript">
	 $(document).ready(function() {
		if (<!--?php echo isset($_SESSION['id_stud'])?'true':'false'; ?>) {
		  alert("session")
		}
	</script-->

	<!--script type="text/javascript">
		(function(){
			var infoElem = $('.info');
			infoElem.each(function(){
				var self = $(this),
				selfTooltipText = self.data('tooltip-text');
			if(selfTooltipText) $('<span/>', {class: 'tooltip',text: selfTooltipText}).appendTo(self);
			});

		})();
	</script-->

</header>
<body id="bodystud-id">
