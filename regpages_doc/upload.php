<?php



$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');


	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



	$idclass =  substr($url, strrpos($url, '=') + 1);



	$result = mysqli_query($dbconn, "SELECT * FROM classe WHERE classe.id = '$idclass'");



	$row_class = mysqli_fetch_assoc($result);



	$class_classe = $row_class['classe'];

	$class_sezione = $row_class['sezione'];



	$class_name = $class_classe . $class_sezione;





$_FILES['userfile']['name'];

$_FILES['userfile']['type'];

$_FILES['userfile']['size'];



$dir = '../documenti/'.$class_name.'/';



if (!file_exists($dir)) {

    mkdir($dir, 0777, true);

}



// per prima cosa verifico che il file sia stato effettivamente caricato

if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {

  header('Location: indexregdoc.php?upload=no_file'); //non hai caricato nessun file

  exit;

}



// limito la dimensione massima a 16MB

if ($_FILES['userfile']['size'] > 16777216) {

   header('Location: indexregdoc.php?upload=big_file'); //file troppo grande

  exit;

}



$target_file = '../documenti/'.$class_name.'/' . $_FILES['userfile']['name'];

if (file_exists($target_file)) {

  header('Location: indexregdoc.php?upload=exist_file'); //file esistente

  exit;

}



//percorso della cartella dove mettere i file caricati dagli utenti

$uploaddir = '../documenti/'.$class_name.'/';



//Recupero il percorso temporaneo del file

$userfile_tmp = $_FILES['userfile']['tmp_name'];



//recupero il nome originale del file caricato

$userfile_name = $_FILES['userfile']['name'];



//copio il file dalla sua posizione temporanea alla mia cartella upload

if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {

  //Se l'operazione � andata a buon fine...

 header('Location: indexregdoc.php?upload=ok'); //file inviato con successo

}else{

  //Se l'operazione � fallta...

  header('Location: indexregdoc.php?upload=no'); //upload fallito

}

?>