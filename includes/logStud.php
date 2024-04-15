<?php
	// avvio la sessione
	session_start();

	// recupero i valori passati via POST
	$username = htmlspecialchars($_POST['username_s'],ENT_QUOTES);
	$password = md5($_POST['password_s']);

	// mi connetto al MySQL
	$dbconn = mysqli_connect('localhost', 'root','');
	mysqli_select_db($dbconn, 'my_pavitis');

	// effettuo la query per verificare la correttezza del login
	$result = mysqli_query($dbconn, "SELECT * FROM accountStud WHERE username = '" . mysqli_real_escape_string($dbconn, $username) . "'");

	// verifico che ci siano dei risltati...
	if (mysqli_num_rows($result) > 0)
	{
	  $row = mysqli_fetch_assoc($result);
	  // effettuo la comparazione della password digitata con quella salvata nel DB
	  if (strcmp($row['password'], $password) == 0) {
		// in caso di successo creo la sesione
		$_SESSION['id_stud'] = $row['id'];
		// e stampo 1 (che identifica il successo)
		echo 1;
	  }else{
		// in caso di comparazione non riuscita stampo zero
		echo 0;
	  }
	}else{
	  // se non ci sono risultati stampo zero
	  echo 0;
	}