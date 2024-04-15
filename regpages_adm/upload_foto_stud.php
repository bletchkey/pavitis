<?php


$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



	$idstud =  substr($url, strrpos($url, '=') + 1);



$_FILES['userfile']['type'];

$_FILES['userfile']['size'];

$types = array('image/jpg','image/jpeg');

if (in_array($_FILES['userfile']['type'], $types)) {

	$_FILES['userfile']['name'] = $idstud.".jpg";



	//echo $_FILES['userfile']['name'];

	//break;

	}

	else

	{

	header('Location: indexregadm.php?upload=no_type'); //upload fallito

	exit;

}









// per prima cosa verifico che il file sia stato effettivamente caricato

if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {

  header('Location: indexregadm.php?upload=no_file'); //non hai caricato nessun file

  exit;

}





// limito la dimensione massima a 2MB

if ($_FILES['userfile']['size'] > 2097152) {

   header('Location: indexregadm.php?upload=big_file'); //file troppo grande

  exit;

}



$target_file = '../foto_stud/' . $_FILES['userfile']['name'];

if (file_exists($target_file)) {

  header('Location: indexregadm.php?upload=exist_file'); //file esistente

  exit;

}



//percorso della cartella dove mettere i file caricati dagli utenti

$uploaddir = '../foto_stud/';



//Recupero il percorso temporaneo del file

$userfile_tmp = $_FILES['userfile']['tmp_name'];



//recupero il nome originale del file caricato

$userfile_name = $_FILES['userfile']['name'];







//copio il file dalla sua posizione temporanea alla mia cartella upload

if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {

  //Se l'operazione � andata a buon fine...

 header('Location: indexregadm.php?upload=ok'); //file inviato con successo

}else{

  //Se l'operazione � fallta...

  header('Location: indexregadm.php?upload=no'); //upload fallito

}



?>