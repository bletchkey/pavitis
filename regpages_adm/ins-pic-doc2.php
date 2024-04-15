<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="/resources/demos/style.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>

  $( function() {

    $( "#dialog" ).dialog();

  } );

  </script>

<?php

	ob_start();

	include '../includes/header_registro_adm.php';



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



	$iddoc =  substr($url, strrpos($url, '=') + 1);





	$result = mysqli_query($dbconn, "SELECT dataDoc.nome, dataDoc.cognome FROM dataDoc WHERE dataDoc.id_accountDoc = '$iddoc'");



	$row_doc = mysqli_fetch_assoc($result);



	$docente = " ".$row_doc['cognome']." ".$row_doc['nome'];



?>

<section>

	<h1 class="title_doc">Carica foto profilo docente</h1>

	<div class="form-upload-doc">

	Carica la foto di profilo a <?php echo $docente;?>

	<form enctype="multipart/form-data" action="upload_foto_doc.php?stud_id=<?php echo $iddoc;?>" method="POST">

		<center><img src="../img/registro_img/cloud-upload.png"></center><br>

	  <input type="hidden" value="30000">

	  <input class="choose_f" name="userfile" type="file"><br><br>

	  <input class="main-button"type="submit" value="Carica foto">

	</form>

	</div>

</section>





<?php

	include '../includes/footer_registro_adm.php';

?>



</body>

</html>