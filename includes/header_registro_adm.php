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
	<?php if($_SESSION["id_adm"] == '') {
				//header('Location: ../includes/err.php');

				echo"<script>";
				echo"alert('Sessione scaduta, riavviare il programma');";
				echo 'window.location= "../index.php"';
				echo"</script>";

			} ?>
	<h1 class="main-title-top">Amministratori</h1>

	<div class="box-name-menu">
		<?php
			$dbconn = mysqli_connect('localhost', 'root','');
			mysqli_select_db($dbconn, 'my_pavitis');

			$ses_var_adm = $_SESSION["id_adm"];

			$result = mysqli_query($dbconn, "SELECT * FROM dataAdm WHERE id_accountAdm = '$ses_var_adm' ");

			if (mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);

				$nome = $row['nome'];
				$cognome = $row['cognome'];
			}

			$id_foto = $ses_var_adm;
			$path_foto = "../foto_adm/".$id_foto.".jpg";

			if(isset($_SESSION['id_adm'])){
				if (file_exists($path_foto)) {
					echo "<div class='cont-info-header'>
						<a href='../regpages_adm/datiregadm.php'><img src='../foto_adm/".$id_foto.".jpg' class='foto_profilo'></a>
						<div class='cont-name-info-adm-doc'>
						Amministratore:&nbsp<div class='container-name'><label class='name'>".$nome."</label>&nbsp<label class='name'>".$cognome."</label></div><br>
						</div>
						</div>
						<br>
						<br>
					";
				} else {
					echo "<div class='cont-info-header'>
						<img src='../img/registro_img/user.png' class='foto_profilo2'>
						<div class='cont-name-info-adm-doc'>
						Amministratore:&nbsp<div class='container-name'><label class='name'>".$nome."</label>&nbsp<label class='name'>".$cognome."</label></div><br>
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

		<div id="mySidenav" class="topnav">
			<br>
			<label class="desc-elem">SERVIZI</label><br><br>
			<a class="tooltips" href="indexregadm.php"><img class="dim" src="../img/registro_img/home.png"><span>Home</span></a>
			<a class="tooltips" href="datiregadm.php"><img class="dim" src="../img/registro_img/dati.png"><span>Dati anagrafici</span></a>
			<a class="tooltips" href="add_acc.php"><img class="dim" src="../img/registro_img/add_acc.png"><span>Nuovo account</span></a>
			<a class="tooltips" href="add_mat.php"><img class="dim" src="../img/registro_img/add_mat.png"><span>Aggiungi materia</span></a>
			<a class="tooltips" href="add_classe.php"><img class="dim" src="../img/registro_img/add_classe.png"><span>Aggiungi classe</span></a>
			<a class="tooltips" href="edit-acc.php"><img class="dim" src="../img/registro_img/edit_acc.png"><span>Modifica account</span></a>
			<a class="tooltips" href="elenco_ut1.php"><img class="dim" src="../img/registro_img/profile.png"><span>Elenco utenti</span></a>
			<a class="tooltips" href="add_c_m_doc.php"><img class="dim" src="../img/registro_img/compiti2.png"><span>Docente classi</span></a>
			<a class="tooltips" href="add_c_a_stud.php"><img class="dim" src="../img/registro_img/stud_class.png"><span>Studenti classi</span></a>
			<a class="tooltips" href="add_pic.php"><img class="dim" src="../img/registro_img/profile_pic.png"><span>Aggiungi foto profilo</span></a>
			<a class="tooltips" href="v_docs_adm_1.php"><img class="dim" src="../img/registro_img/folder.png"><span>Visualizza Documenti</span></a>
			<a class="tooltips" href="../includes/userLogout.php"><img class="dim" src="../img/registro_img/esci.png"><span>Esci</span></a><br><br><br>
			<label class="desc-elem">UTILITA'</label><br><br>
			<a class="tooltips" href="change_psw_adm.php"><img class="dim" src="../img/registro_img/key.png"><span>Cambia pw</span></a>
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
			document.getElementById("txt_menu").innerHTML = "MENU";
        }else{
		document.getElementById("mySidenav").style.height = "300px";
		x.classList.toggle("change");
		document.getElementById("txt_menu").innerHTML = "CHIUDI";
        }
	}
	</script>
</header>
<body id="bodyadm-id">