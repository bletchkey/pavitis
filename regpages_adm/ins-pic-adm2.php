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



	$idadm =  substr($url, strrpos($url, '=') + 1);





	$result = mysqli_query($dbconn, "SELECT dataAdm.nome, dataAdm.cognome FROM dataAdm WHERE dataAdm.id_accountAdm = '$idadm'");



	$row_adm = mysqli_fetch_assoc($result);



	$amministratore = " ".$row_adm['cognome']." ".$row_adm['nome'];



?>

<section>

	<h1 class="title_doc">Carica foto profilo amministratore</h1>

	<div class="form-upload-doc">

	Carica la foto di profilo a <?php echo $amministratore;?>

	<form enctype="multipart/form-data" action="upload_foto_adm.php?stud_id=<?php echo $idadm;?>" method="POST">

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