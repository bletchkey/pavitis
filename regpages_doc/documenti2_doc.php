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

	include '../includes/header_registro_doc.php';



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



	$idclass =  substr($url, strrpos($url, '=') + 1);





	$result = mysqli_query($dbconn, "SELECT * FROM classe WHERE classe.id = '$idclass'");



	$row_class = mysqli_fetch_assoc($result);



	$class_classe = $row_class['classe'];

	$class_sezione = $row_class['sezione'];



	$class_name = $class_classe . $class_sezione;

?>

<section>

	<h1 class="title_doc">Carica file</h1>

	<div class="form-upload-doc">

	Invia un documento alla classe: <?php echo $class_name;?>

	<form enctype="multipart/form-data" action="upload.php?class_id=<?php echo $idclass;?>" method="POST">

		<center><img src="../img/registro_img/cloud-upload.png"></center><br>

	  <input type="hidden" value="30000">

	  <input class="choose_f" name="userfile" type="file"><br><br>

	  <input class="main-button"type="submit" value="Carica documento">

	</form>

	</div>

</section>





<?php

	include '../includes/footer_registro_doc.php';

?>



</body>

</html>