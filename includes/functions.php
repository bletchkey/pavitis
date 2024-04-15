<?php

//Funzione per la disconnessione 'LOG OUT'
function userLogout(){
		session_start();
		session_destroy();
		header("Location: index.php");
		exit();
}

//Funzione per la registrazione di un nuovo account amministratore 'SIGN UP'
function addAdm($conn){
			if(isset($_POST['adm_createaccSubmit'])){
			session_start();
			include 'dbh.inc.php';

			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$conf_password = mysqli_real_escape_string($conn, $_POST['conf_password']);
			$sesso = $_POST['sesso'];
			$nome = mysqli_real_escape_string($conn, $_POST['nome']);
			$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
			$anno = mysqli_real_escape_string($conn, $_POST['anno']);
			$mese = mysqli_real_escape_string($conn, $_POST['mese']);
			$giorno = mysqli_real_escape_string($conn, $_POST['giorno']);
			$cf = mysqli_real_escape_string($conn, $_POST['codfis']);
			$cittadinanza = mysqli_real_escape_string($conn, $_POST['cittadinanza']);
			$comresidenza = mysqli_real_escape_string($conn, $_POST['comresidenza']);
			$provresidenza = mysqli_real_escape_string($conn, $_POST['provresidenza']);
			$cap = mysqli_real_escape_string($conn, $_POST['cap']);
			$via = mysqli_real_escape_string($conn, $_POST['via']);
			$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);


			switch($mese){
				case 'Gennaio':
					$mese_n="1";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Febbraio':
					$mese_n="2";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Marzo':
					$mese_n="3";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Aprile':
					$mese_n="4";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Maggio':
					$mese_n="5";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Giugno':
					$mese_n="6";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Luglio':
					$mese_n="7";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Agosto':
					$mese_n="8";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Settembre':
					$mese_n="9";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Ottobre':
					$mese_n="10";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Novembre':
					$mese_n="11";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Dicembre':
					$mese_n="12";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
			}



			$get_username_adm = "SELECT username FROM accountAdm WHERE username = '$username' ";
			$result = $conn->query($get_username_adm);
			$check_username = mysqli_num_rows($result);

			if($check_username > 0){
				header("Location: ins-adm.php?error=username");
				exit();
			}
			if($password != $conf_password){
				header("Location: ins-adm.php?error=psw");
				exit();
			}
			else{
				$md5_password = md5($conf_password);
				$sql = "INSERT INTO accountAdm(username,password)
				VALUES ('$username','$md5_password')";
				$result = $conn->query($sql);

				$sql_id ="SELECT * FROM accountAdm WHERE username = '$username' AND password = '$md5_password'";
				$result_id = $conn->query($sql_id);
				$row_id = $result_id->fetch_assoc();

				//$id_acc_adm = intval($row_id['id']);
				$id_acc_adm = $row_id['id'];


				$sql2 = "INSERT INTO dataAdm(cognome,nome,datanascita,sesso,codicefiscale,cittadinanza,comuneresidenza,provinciaresidenza,cap,via,telefono,id_accountAdm)
				VALUES ('$cognome','$nome','$datanascita','$sesso','$cf','$cittadinanza','$comresidenza','$provresidenza','$cap','$via','$telefono','$id_acc_adm')";
				$result2 = $conn->query($sql2);

				header("Location: indexregadm.php?ins_person=ok");
				exit();
			}
	}
}



//Funzione per la registrazione di un nuovo account docente 'SIGN UP'
function addDoc($conn){
			if(isset($_POST['doc_createaccSubmit'])){
			session_start();
			include 'dbh.inc.php';

			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$conf_password = mysqli_real_escape_string($conn, $_POST['conf_password']);
			$sesso = $_POST['sesso'];
			$nome = mysqli_real_escape_string($conn, $_POST['nome']);
			$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
			$anno = mysqli_real_escape_string($conn, $_POST['anno']);
			$mese = mysqli_real_escape_string($conn, $_POST['mese']);
			$giorno = mysqli_real_escape_string($conn, $_POST['giorno']);
			$cf = mysqli_real_escape_string($conn, $_POST['codfis']);
			$cittadinanza = mysqli_real_escape_string($conn, $_POST['cittadinanza']);
			$comresidenza = mysqli_real_escape_string($conn, $_POST['comresidenza']);
			$provresidenza = mysqli_real_escape_string($conn, $_POST['provresidenza']);
			$cap = mysqli_real_escape_string($conn, $_POST['cap']);
			$via = mysqli_real_escape_string($conn, $_POST['via']);
			$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);


			switch($mese){
				case 'Gennaio':
					$mese_n="1";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Febbraio':
					$mese_n="2";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Marzo':
					$mese_n="3";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Aprile':
					$mese_n="4";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Maggio':
					$mese_n="5";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Giugno':
					$mese_n="6";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Luglio':
					$mese_n="7";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Agosto':
					$mese_n="8";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Settembre':
					$mese_n="9";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Ottobre':
					$mese_n="10";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Novembre':
					$mese_n="11";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
				case 'Dicembre':
					$mese_n="12";
					$datanascita = $anno."-".$mese_n."-".$giorno;
				break;
			}

			$get_username_doc = "SELECT username FROM accountDoc WHERE username = '$username' ";
			$result = $conn->query($get_username_doc);
			$check_username = mysqli_num_rows($result);

			if($check_username > 0){
				header("Location: ins-doc.php?error=username");
				exit();
			}
			if($password != $conf_password){
				header("Location: ins-doc.php?error=psw");
				exit();
			}
			else{
				$md5_password = md5($conf_password);
				$sql = "INSERT INTO accountDoc(username,password)
				VALUES ('$username','$md5_password')";
				$result = $conn->query($sql);

				$sql_id ="SELECT * FROM accountDoc WHERE username = '$username' AND password = '$md5_password'";
				$result_id = $conn->query($sql_id);
				$row_id = $result_id->fetch_assoc();

				//$id_acc_doc = intval($row_id['id']);
				$id_acc_doc = $row_id['id'];


				$sql2 = "INSERT INTO dataDoc(cognome,nome,datanascita,sesso,codicefiscale,cittadinanza,comuneresidenza,provinciaresidenza,cap,via,telefono,id_accountDoc)
				VALUES ('$cognome','$nome','$datanascita','$sesso','$cf','$cittadinanza','$comresidenza','$provresidenza','$cap','$via','$telefono','$id_acc_doc')";
				$result2 = $conn->query($sql2);

				header("Location: indexregadm.php?ins_person=ok");
				exit();
			}

		}
	}


//Funzione per la registrazione di un nuovo account studente 'SIGN UP'
function addStud($conn){
	if(isset($_POST['stud_createaccSubmit'])){
	session_start();
	include 'dbh.inc.php';

	$nome_classe = $_POST['classe'];
	$anno_classe = $_POST['anno_classe'];
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$conf_password = mysqli_real_escape_string($conn, $_POST['conf_password']);
	$sesso = $_POST['sesso'];
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
	$anno = mysqli_real_escape_string($conn, $_POST['anno']);
	$mese = mysqli_real_escape_string($conn, $_POST['mese']);
	$giorno = mysqli_real_escape_string($conn, $_POST['giorno']);
	$cf = mysqli_real_escape_string($conn, $_POST['codfis']);
	$cittadinanza = mysqli_real_escape_string($conn, $_POST['cittadinanza']);
	$comresidenza = mysqli_real_escape_string($conn, $_POST['comresidenza']);
	$provresidenza = mysqli_real_escape_string($conn, $_POST['provresidenza']);
	$cap = mysqli_real_escape_string($conn, $_POST['cap']);
	$via = mysqli_real_escape_string($conn, $_POST['via']);
	$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);


	switch($mese){
		case 'Gennaio':
			$mese_n="1";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Febbraio':
			$mese_n="2";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Marzo':
			$mese_n="3";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Aprile':
			$mese_n="4";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Maggio':
			$mese_n="5";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Giugno':
			$mese_n="6";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Luglio':
			$mese_n="7";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Agosto':
			$mese_n="8";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Settembre':
			$mese_n="9";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Ottobre':
			$mese_n="10";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Novembre':
			$mese_n="11";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
		case 'Dicembre':
			$mese_n="12";
			$datanascita = $anno."-".$mese_n."-".$giorno;
		break;
	}

		$get_username_stud = "SELECT username FROM accountStud WHERE username = '$username' ";
		$result = $conn->query($get_username_stud);
		$check_username = mysqli_num_rows($result);

		if($check_username > 0){
			header("Location: ins-stud.php?error=username");
			exit();
		}
		if($password != $conf_password){
			header("Location: ins-stud.php?error=psw");
			exit();
		}
		else{
			$md5_password = md5($conf_password);
			$sql = "INSERT INTO accountStud(username,password)
			VALUES ('$username','$md5_password')";
			$result = $conn->query($sql);


			$sql_id ="SELECT * FROM accountStud WHERE username = '$username' AND password = '$md5_password'";
			$result_id = $conn->query($sql_id);
			$row_id = $result_id->fetch_assoc();

			//$id_acc_stud = intval($row_id['id']);
			$id_acc_stud = $row_id['id'];

			$sql2 = "INSERT INTO dataStud(cognome,nome,datanascita,sesso,codicefiscale,cittadinanza,comuneresidenza,provinciaresidenza,cap,via,telefono,id_accountStud)
			VALUES ('$cognome','$nome','$datanascita','$sesso','$cf','$cittadinanza','$comresidenza','$provresidenza','$cap','$via','$telefono','$id_acc_stud')";
			$result2 = $conn->query($sql2);


			$arr_classe = str_split($nome_classe);

			$class_cl= $arr_classe[0];
			$class_sez= $arr_classe[1];

			$sql_id_classe="SELECT classe.id FROM classe WHERE classe.classe='$class_cl' AND classe.sezione = '$class_sez'";
			$result_id_classe= $conn->query($sql_id_classe);
			$row_id_classe = $result_id_classe->fetch_assoc();
			$id_classe = $row_id_classe['id'];

			$sql3 = "INSERT INTO studenteclasse(classe,studente,anno)
			VALUES ('$id_classe','$id_acc_stud','$anno_classe')";
			$result3 = $conn->query($sql3);

			header("Location: indexregadm.php?ins_person=ok");
			exit();
		}

	}
}

//Funzione per la modifica di un account studente
function editStud($conn){
	if(isset($_POST['stud_editaccSubmit'])){
	session_start();
	include 'dbh.inc.php';

	$nome_classe = $_POST['classe'];
	$anno_classe = $_POST['anno_classe'];
	$id_studente = $_SESSION['id_studente_modifica_dati'];
	$sesso = $_POST['sesso'];
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
	$anno = mysqli_real_escape_string($conn, $_POST['anno']);
	$mese = mysqli_real_escape_string($conn, $_POST['mese']);
	$giorno = mysqli_real_escape_string($conn, $_POST['giorno']);
	$cf = mysqli_real_escape_string($conn, $_POST['codfis']);
	$cittadinanza = mysqli_real_escape_string($conn, $_POST['cittadinanza']);
	$comresidenza = mysqli_real_escape_string($conn, $_POST['comresidenza']);
	$provresidenza = mysqli_real_escape_string($conn, $_POST['provresidenza']);
	$cap = mysqli_real_escape_string($conn, $_POST['cap']);
	$via = mysqli_real_escape_string($conn, $_POST['via']);
	$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);

	$datanascita = $anno."-".$mese."-".$giorno;

	//echo $cognome,$nome,$mese,$giorno,$anno,$datanascita,$sesso,$cf,$cittadinanza,$comresidenza,$provresidenza,$cap,$via,$telefono,$id_studente;
	//break;

	//FACCIO UPDATE
	$sql = "UPDATE dataStud SET cognome='$cognome' ,nome='$nome', datanascita ='$datanascita' ,sesso='$sesso',codicefiscale='$cf',cittadinanza='$cittadinanza',comuneresidenza='$comresidenza',provinciaresidenza='$provresidenza',cap='$cap',via='$via',telefono='$telefono' WHERE id_accountStud = '$id_studente' ";

	$stmt = $conn->prepare($sql);

	// execute the query
	$stmt->execute();

	/*$arr_classe = str_split($nome_classe);

	$class_cl= $arr_classe[0];
	$class_sez= $arr_classe[1];

	$sql_id_classe="SELECT classe.id FROM classe WHERE classe.classe='$class_cl' AND classe.sezione = '$class_sez'";
	$result_id_classe= $conn->query($sql_id_classe);
	$row_id_classe = $result_id_classe->fetch_assoc();
	$id_classe = $row_id_classe['id'];

	$sql3 = "INSERT INTO studenteclasse(classe,studente,anno)
	VALUES ('$id_classe','$id_acc_stud','$anno_classe')";
	$result3 = $conn->query($sql3);*/

	header("Location: indexregadm.php?edit_person=ok");
	exit();
	}
}


//Funzione per la modifica di un account docente
function editDoc($conn){
	if(isset($_POST['doc_editaccSubmit'])){
	session_start();
	include 'dbh.inc.php';

	$id_docente = $_SESSION['id_docente_modifica_dati'];
	$sesso = $_POST['sesso'];
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
	$anno = mysqli_real_escape_string($conn, $_POST['anno']);
	$mese = mysqli_real_escape_string($conn, $_POST['mese']);
	$giorno = mysqli_real_escape_string($conn, $_POST['giorno']);
	$cf = mysqli_real_escape_string($conn, $_POST['codfis']);
	$cittadinanza = mysqli_real_escape_string($conn, $_POST['cittadinanza']);
	$comresidenza = mysqli_real_escape_string($conn, $_POST['comresidenza']);
	$provresidenza = mysqli_real_escape_string($conn, $_POST['provresidenza']);
	$cap = mysqli_real_escape_string($conn, $_POST['cap']);
	$via = mysqli_real_escape_string($conn, $_POST['via']);
	$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);

	$datanascita = $anno."-".$mese."-".$giorno;

	//FACCIO UPDATE
	$sql = "UPDATE dataDoc SET cognome='$cognome' ,nome='$nome', datanascita ='$datanascita' ,sesso='$sesso',codicefiscale='$cf',cittadinanza='$cittadinanza',comuneresidenza='$comresidenza',provinciaresidenza='$provresidenza',cap='$cap',via='$via',telefono='$telefono' WHERE id_accountDoc = '$id_docente' ";
	$stmt = $conn->prepare($sql);

	// execute the query
	$stmt->execute();


	header("Location: indexregadm.php?edit_person=ok");
	exit();
	}
}


//Funzione per la modifica di un account amministratore
function editAdm($conn){
	if(isset($_POST['adm_editaccSubmit'])){
	session_start();
	include 'dbh.inc.php';

	$id_adm = $_SESSION['id_amministratore_modifica_dati'];
	$sesso = $_POST['sesso'];
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
	$anno = mysqli_real_escape_string($conn, $_POST['anno']);
	$mese = mysqli_real_escape_string($conn, $_POST['mese']);
	$giorno = mysqli_real_escape_string($conn, $_POST['giorno']);
	$cf = mysqli_real_escape_string($conn, $_POST['codfis']);
	$cittadinanza = mysqli_real_escape_string($conn, $_POST['cittadinanza']);
	$comresidenza = mysqli_real_escape_string($conn, $_POST['comresidenza']);
	$provresidenza = mysqli_real_escape_string($conn, $_POST['provresidenza']);
	$cap = mysqli_real_escape_string($conn, $_POST['cap']);
	$via = mysqli_real_escape_string($conn, $_POST['via']);
	$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);


	$datanascita = $anno."-".$mese."-".$giorno;

	//FACCIO UPDATE
	$sql = "UPDATE dataAdm SET cognome='$cognome' ,nome='$nome', datanascita ='$datanascita' ,sesso='$sesso',codicefiscale='$cf',cittadinanza='$cittadinanza',comuneresidenza='$comresidenza',provinciaresidenza='$provresidenza',cap='$cap',via='$via',telefono='$telefono' WHERE id_accountAdm = '$id_adm' ";
	$stmt = $conn->prepare($sql);

		// execute the query
		$stmt->execute();


	header("Location: indexregadm.php?edit_person=ok");
	exit();
	}

}




//Funzione per l'inserimento di un singolo voto
function insVoto($conn){
	if(isset($_POST['insVoto'])){
			session_start();
			include 'dbh.inc.php';

			$id_studente_voto = $_SESSION["id_studente_voto"];
			$ses_var_doc = $_SESSION["id_doc"];
			$data = $_POST['data'];
			$materia = $_POST['materia'];
			$voto = $_POST['voto'];
			$commento = $_POST['message'];

			list($d,$m,$y) = explode('/',$data);

			$data_c = $y."-".$m."-".$d;

			switch ($voto){
				case '1': $voto_scritto = "uno"; break;
				case '1.5': $voto_scritto = "uno e mezzo"; break;
				case '2': $voto_scritto = "due"; break;
				case '2.5': $voto_scritto = "due e mezzo"; break;
				case '3': $voto_scritto = "tre"; break;
				case '3.5': $voto_scritto = "tre e mezzo"; break;
				case '4': $voto_scritto = "quattro"; break;
				case '4.5': $voto_scritto = "quattro e mezzo"; break;
				case '5': $voto_scritto = "cinque"; break;
				case '5.5': $voto_scritto = "cinque e mezzo"; break;
				case '6': $voto_scritto = "sei"; break;
				case '6.5': $voto_scritto = "sei e mezzo"; break;
				case '7': $voto_scritto = "sette"; break;
				case '7.5': $voto_scritto = "sette e mezzo"; break;
				case '8': $voto_scritto = "otto"; break;
				case '8.5': $voto_scritto = "otto e mezzo"; break;
				case '9': $voto_scritto = "nove"; break;
				case '9.5': $voto_scritto = "nove e mezzo"; break;
				case '10': $voto_scritto = "dieci"; break;
			}


				$get_materie = mysqli_query($dbconn, "SELECT * FROM materia");


				while($row_mat = mysqli_fetch_assoc($get_materie)){
						$id_materia = $row_mat['id'];
						$materia_nome = $row_mat['materia'];

						if($materia == $materia_nome)
						{
							$materia = $id_materia;

						}

				}//end while

			//echo $id_studente_voto," ",$ses_var_doc," ",$materia," ",$voto," ",$voto_scritto," ",$data_c," ",$commento;

			$inserisci_voto = "INSERT INTO studentevoto(studente,docente,materia,voto_n,voto_scritto,data,message)
			VALUES ('$id_studente_voto','$ses_var_doc','$materia','$voto','$voto_scritto','$data_c','$commento')";
			$result = $conn->query($inserisci_voto);

			header("Location: indexregdoc.php?ins_voto=ok");
			exit();


	}
}



//Funzione per la modifica di un voto
function editVoto($conn){
	if(isset($_POST['editVoto'])){
			session_start();
			include 'dbh.inc.php';

			$data = $_POST['data'];
			$materia = $_POST['materia'];
			$voto = $_POST['voto'];
			$commento = $_POST['message'];
			$id_voto = $_SESSION["id_voto_ed"];


			list($d,$m,$y) = explode('/',$data);

			$data_c = $y."-".$m."-".$d;

			switch ($voto){
				case '1': $voto_scritto = "uno"; break;
				case '1.5': $voto_scritto = "uno e mezzo"; break;
				case '2': $voto_scritto = "due"; break;
				case '2.5': $voto_scritto = "due e mezzo"; break;
				case '3': $voto_scritto = "tre"; break;
				case '3.5': $voto_scritto = "tre e mezzo"; break;
				case '4': $voto_scritto = "quattro"; break;
				case '4.5': $voto_scritto = "quattro e mezzo"; break;
				case '5': $voto_scritto = "cinque"; break;
				case '5.5': $voto_scritto = "cinque e mezzo"; break;
				case '6': $voto_scritto = "sei"; break;
				case '6.5': $voto_scritto = "sei e mezzo"; break;
				case '7': $voto_scritto = "sette"; break;
				case '7.5': $voto_scritto = "sette e mezzo"; break;
				case '8': $voto_scritto = "otto"; break;
				case '8.5': $voto_scritto = "otto e mezzo"; break;
				case '9': $voto_scritto = "nove"; break;
				case '9.5': $voto_scritto = "nove e mezzo"; break;
				case '10': $voto_scritto = "dieci"; break;
			}


				$get_materie = mysqli_query($dbconn, "SELECT * FROM materia");


				while($row_mat = mysqli_fetch_assoc($get_materie)){
						$id_materia = $row_mat['id'];
						$materia_nome = $row_mat['materia'];

						if($materia == $materia_nome)
						{
							$materia = $id_materia;

						}

				}//end while


			//Eseguo l'UPDATE
			$sql = "UPDATE studentevoto SET voto_n='$voto',voto_scritto='$voto_scritto',materia='$materia',message='$commento' WHERE id='$id_voto'";

			// Prepare statement
			$stmt = $conn->prepare($sql);

			// execute the query
			$stmt->execute();

			header("Location: indexregdoc.php?edit_voto=ok");
			exit();


	}elseif(isset($_POST['delVoto'])){
		session_start();
		include 'dbh.inc.php';

		$id_voto = $_SESSION["id_voto_ed"];

		$sql_del = "DELETE FROM studentevoto WHERE id='$id_voto'";
		$conn->query($sql_del);

		header("Location: indexregdoc.php?del_voto=ok");
		exit();

	}
}


//Funzione per l'inserimento di una nota
function insNota($conn){
	if(isset($_POST['insNota'])){
			session_start();
			include 'dbh.inc.php';

			$id_studente_nota = $_SESSION["id_studente_nota"];
			$ses_var_doc = $_SESSION["id_doc"];
			$data = $_POST['data'];
			$luogo = $_POST['luogo'];
			$nota = $_POST['nota'];

			list($d,$m,$y) = explode('/',$data);

			$data_c = $y."-".$m."-".$d;

			//echo $id_studente_nota,$ses_var_doc,$data,$luogo,$nota;
			//break;

			//echo $id_studente_voto," ",$ses_var_doc," ",$materia," ",$voto," ",$voto_scritto," ",$data_c," ",$commento;

			$inserisci_nota = "INSERT INTO studentenota(studente,docente,luogo,data,testo_nota)
			VALUES ('$id_studente_nota','$ses_var_doc','$luogo','$data_c','$nota')";
			$result = $conn->query($inserisci_nota);

			header("Location: indexregdoc.php?ins_nota=ok");
			exit();


	}
}


//Funzione per la modifica di una nota
function editNota($conn){
	if(isset($_POST['editNota'])){
			session_start();
			include 'dbh.inc.php';

			$id_nota = $_SESSION["id_nota_ed"];
			$data = $_POST['data'];
			$luogo = $_POST['luogo'];
			$nota = $_POST['nota'];

			list($d,$m,$y) = explode('/',$data);

			$data_c = $y."-".$m."-".$d;

			//Eseguo l'UPDATE
			$sql = "UPDATE studentenota SET data='$data_c',luogo='$luogo',testo_nota='$nota' WHERE id='$id_nota'";

			// Prepare statement
			$stmt = $conn->prepare($sql);

			// execute the query
			$stmt->execute();

			header("Location: indexregdoc.php?edit_nota=ok");
			exit();


	}elseif(isset($_POST['delNota'])){
		session_start();
		include 'dbh.inc.php';

		$id_nota = $_SESSION["id_nota_ed"];

		$sql_del = "DELETE FROM studentenota WHERE id='$id_nota'";
		$conn->query($sql_del);

		header("Location: indexregdoc.php?del_nota=ok");
		exit();

	}
}


//Funzione per l'inserimento di un compito
function insCompito($conn){
	if(isset($_POST['insCompito'])){
			session_start();
			include 'dbh.inc.php';

			$id_classe = $_SESSION["id_classe_compito"];
			$ses_var_doc = $_SESSION["id_doc"];
			$data = $_POST['data'];
			$materia = $_POST['materia'];
			$descrizione = $_POST['descrizione'];

			list($d,$m,$y) = explode('/',$data);

			$data_c = $y."-".$m."-".$d;
			$data_per = date("Y-m-d");


			$get_materie = mysqli_query($dbconn, "SELECT * FROM materia");


			while($row_mat = mysqli_fetch_assoc($get_materie)){
					$id_materia = $row_mat['id'];
					$materia_nome = $row_mat['materia'];

					if($materia == $materia_nome)
					{
						$materia = $id_materia;

					}

			}//end while

			$inserisci_voto = "INSERT INTO compiticlasse(classe,docente,materia,il,per,testo)
			VALUES ('$id_classe','$ses_var_doc','$materia','$data_c','$data_per','$descrizione')";
			$result = $conn->query($inserisci_voto);

			header("Location: indexregdoc.php?ins_compito=ok");
			exit();
	}
}


//Funzione per la modifica/eliminazione di un compito
function editCompito($conn){
	if(isset($_POST['editCompito'])){
			session_start();
			include 'dbh.inc.php';

			$idcompito = $_SESSION["id_compito"];
			$data_ass = $_POST['data_ass'];
			$data_con = $_POST['data_con'];
			$materia = $_POST['materia'];
			$descrizione = $_POST['descrizione'];

			list($d,$m,$y) = explode('/',$data_ass);

			$data_ass_c = $y."-".$m."-".$d;

			list($d,$m,$y) = explode('/',$data_con);

			$data_con_c = $y."-".$m."-".$d;

			$get_materie = mysqli_query($dbconn, "SELECT * FROM materia");


				while($row_mat = mysqli_fetch_assoc($get_materie)){
						$id_materia = $row_mat['id'];
						$materia_nome = $row_mat['materia'];

						if($materia == $materia_nome)
						{
							$materia = $id_materia;

						}

				}//end while

			//Eseguo l'UPDATE

			//echo $data_con_c." ".$data_ass_c." ".$descrizione." ".$materia." ".$idcompito;
			//break;
			$sql = "UPDATE compiticlasse SET il='$data_con_c',per='$data_ass_c',testo='$descrizione',materia='$materia' WHERE id='$idcompito'";

			// Prepare statement
			$stmt = $conn->prepare($sql);

			// execute the query
			$stmt->execute();

			header("Location: indexregdoc.php?edit_compito=ok");
			exit();


	}elseif(isset($_POST['delCompito'])){
		session_start();
		include 'dbh.inc.php';

		$idcompito = $_SESSION["id_compito"];

		$sql_del = "DELETE FROM compiticlasse WHERE id='$idcompito'";
		$conn->query($sql_del);

		header("Location: indexregdoc.php?del_compito=ok");
		exit();
	}
}


//Funzione per l'assegnazione di classi/materie a docenti
function insDocClasses($conn){
	if(isset($_POST['ins_doc_classes'])){
	session_start();
	include 'dbh.inc.php';

	$nome_classe = $_POST['classe'];
	$anno_classe = $_POST['anno_classe'];
	$materia = $_POST['materia'];
	$docente = $_POST['docente'];

	$arr_classe = str_split($nome_classe);

	$class_cl= $arr_classe[0];
	$class_sez= $arr_classe[1];
	$sql_id_classe="SELECT classe.id FROM classe WHERE classe.classe='$class_cl' AND classe.sezione = '$class_sez'";
	$result_id_classe= $conn->query($sql_id_classe);
	$row_id_classe = $result_id_classe->fetch_assoc();
	$id_classe = $row_id_classe['id'];

	$get_materie = mysqli_query($dbconn, "SELECT * FROM materia");


	while($row_mat = mysqli_fetch_assoc($get_materie)){
			$id_materia = $row_mat['id'];
			$materia_nome = $row_mat['materia'];

			if($materia == $materia_nome)
			{
				$materia = $id_materia;

			}

	}//end while

	//echo $id_classe." ".$anno_classe." ".$materia." ".$docente." ".$docente_id;
	//break;

	$result_doc_classe = mysqli_query($dbconn, "SELECT docenteclasse.id,docenteclasse.docente,docenteclasse.classe,docenteclasse.anno, COUNT(id) FROM docenteclasse GROUP BY docenteclasse.docente,docenteclasse.classe,docenteclasse.anno HAVING docenteclasse.classe = '$id_classe' AND docenteclasse.docente = '$docente' AND docenteclasse.anno = '$anno_classe'");
	$result_materia_doc_classe = mysqli_query($dbconn, "SELECT materiadocente.docente,materiadocente.classe,materiadocente.materia , COUNT(id) FROM materiadocente GROUP BY materiadocente.docente,materiadocente.classe,materiadocente.materia HAVING materiadocente.classe = '$id_classe' AND materiadocente.docente = '$docente' AND materiadocente.materia = '$materia'");

	$row_doc_classes = mysqli_fetch_assoc($result_doc_classe);

	$n_count1 = $row_doc_classes['COUNT(id)'];

	$row_materia_doc_classe = mysqli_fetch_assoc($result_materia_doc_classe);
	$n_count2 = $row_materia_doc_classe['COUNT(id)'];


	if(($n_count1!=0)&&($n_count2==0))
	{
		$sql_materia_doc_class = "INSERT INTO materiadocente(classe,docente,materia)
		VALUES ('$id_classe','$docente','$materia')";
		$result_materia_doc_class = $conn->query($sql_materia_doc_class);
		header("Location: indexregadm.php?doc_classes=ok");
		exit();

	}elseif($n_count1==0){
		$sql_doc_class = "INSERT INTO docenteclasse(classe,docente,anno)
		VALUES ('$id_classe','$docente','$anno_classe')";
		$result_doc_class = $conn->query($sql_doc_class);

		$sql_materia_doc_class2 = "INSERT INTO materiadocente(classe,docente,materia)
		VALUES ('$id_classe','$docente','$materia')";
		$result_materia_doc_class2 = $conn->query($sql_materia_doc_class2);

		header("Location: indexregadm.php?doc_classes=ok");
		exit();


	}else{
		header("Location: indexregadm.php?doc_classes=no");
		exit();
	}

	}

}


//Funzione per inserimento materia
function addMat($conn){
			if(isset($_POST['addmat_Submit'])){
			session_start();
			include 'dbh.inc.php';

			$materia = $_POST['materia'];

			$sql_get_mat = mysqli_query($dbconn, "SELECT materia, COUNT(id) FROM materia GROUP BY materia HAVING materia = '$materia' ");
			$row_get_mat = mysqli_fetch_assoc($sql_get_mat);

			$n_count1 = $row_get_mat['COUNT(id)'];

			if($n_count1==0){
				$sql_mat = "INSERT INTO materia(materia)
				VALUES ('$materia')";
			    $result_mat = $conn->query($sql_mat);
				header("Location: indexregadm.php?ins_mat=ok");
				exit();

			}else{
				header("Location: indexregadm.php?ins_mat=no");
				exit();

			}
		}
}



//Funzione per inserimento classe
function addClasse($conn){
			if(isset($_POST['addclasse_Submit'])){
			session_start();
			include 'dbh.inc.php';

			$classe = $_POST['classe'];
			$sezione = $_POST['sezione'];
			$anno = $_POST['anno_classe'];
			$indirizzo = $_POST['indirizzo'];


			$sql_get_classe = mysqli_query($dbconn, "SELECT classe,sezione,indirizzo,anno,id, COUNT(id) FROM classe GROUP BY classe,sezione,indirizzo,anno HAVING classe= '$classe' AND sezione = '$sezione' AND anno = '$anno' AND indirizzo = '$indirizzo'");
			$row_get_classe = mysqli_fetch_assoc($sql_get_classe);

			$n_count1 = $row_get_mat['COUNT(id)'];

			if($n_count1==0){
				$sql_classe = "INSERT INTO classe(indirizzo,classe,sezione,anno)
				VALUES ('$indirizzo','$classe','$sezione','$anno')";
			    $result_classe = $conn->query($sql_classe);
				header("Location: indexregadm.php?ins_classe=ok");
				exit();

			}else{
				header("Location: indexregadm.php?ins_classe=no");
				exit();

			}
		}
}


//Funzione per inserimento studente-classe
function addStudClasse($conn){
	if(isset($_POST['addstudclasse_Submit'])){
	session_start();
	include 'dbh.inc.php';

	$nome_classe = $_POST['classe'];
	$anno_classe = $_POST['anno_classe'];
	$studente = $_POST['studente'];

	$arr_classe = str_split($nome_classe);

	$class_cl= $arr_classe[0];
	$class_sez= $arr_classe[1];
	$sql_id_classe="SELECT classe.id FROM classe WHERE classe.classe='$class_cl' AND classe.sezione = '$class_sez'";
	$result_id_classe= $conn->query($sql_id_classe);
	$row_id_classe = $result_id_classe->fetch_assoc();
	$id_classe = $row_id_classe['id'];


	//echo $id_classe." ".$anno_classe." ".$materia." ".$docente." ".$docente_id;
	//break;

	//$result_stud_classe = mysqli_query($dbconn, "SELECT studenteclasse.id,studenteclasse.studente,studenteclasse.classe,studenteclasse.anno, COUNT(id) FROM studenteclasse GROUP BY studenteclasse.studente,studenteclasse.classe,studenteclasse.anno HAVING studenteclasse.classe = '$id_classe' AND studenteclasse.studente = '$studente' AND studenteclasse.anno = '$anno_classe'");
	$result_stud_classe = mysqli_query($dbconn, "SELECT studenteclasse.id,studenteclasse.studente,studenteclasse.classe,studenteclasse.anno FROM studenteclasse WHERE studenteclasse.studente = '$studente' AND studenteclasse.anno = '$anno_classe'");

	$num_rows = 0;

	while ($row = mysqli_fetch_array($result_stud_classe)){
	  $num_rows++;
	}

	if($num_rows>0)
	{
		header("Location: indexregadm.php?stud_classes=no");
		exit();

	}else{

		$sql_stud_class = "INSERT INTO studenteclasse(classe,studente,anno)
		VALUES ('$id_classe','$studente','$anno_classe')";
		$result_stud_class = $conn->query($sql_stud_class);
		header("Location: indexregadm.php?stud_classes=ok");
		exit();

	}

	}
}











