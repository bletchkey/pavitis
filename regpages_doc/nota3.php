<?php

	ob_start();

	include '../includes/header_registro_doc.php';

	session_start();



?>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="/resources/demos/style.css">

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

  $( function() {

    $( "#dialog" ).dialog();

  } );

  </script>

 <script>

  $( function() {

    $( "#accordion" ).accordion();

  } );

  </script>

   <script>

  $.datepicker.setDefaults({

           dateFormat: 'dd/mm/yy'
           });

           $(function(){

                $("#datepicker").datepicker();



           });

  </script>

<section>

	<?php

	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



	$ses_var_doc = $_SESSION["id_doc"];



	$n=0;



	$idstud =  substr($url, strrpos($url, '=') + 1);



	$_SESSION["id_studente_nota"] = $idstud;



	$result = mysqli_query($dbconn, "SELECT * FROM dataStud INNER JOIN ( accountStud INNER JOIN studenteclasse ON (accountStud.id=studenteclasse.studente)) ON (dataStud.id_accountStud=accountStud.id) WHERE studenteclasse.studente = '$idstud' ORDER BY dataStud.cognome ASC");

	$get_materie = mysqli_query($dbconn, "SELECT materia.materia FROM materia INNER JOIN materiadocente ON (materia.id=materiadocente.materia) WHERE materiadocente.docente = '$ses_var_doc' ORDER BY materia.materia ASC");



	echo"<form action='".insNota($conn)."' method='POST'>";



	?>

	<h1 class="title_doc">Inserisci nota disciplinare</h1>

	<table class="table-ins-voti">

	<tr class="tr-ins-voti">

	<th class="th-ins-voti">Cognome</th>

	<th class="th-ins-voti">Nome</th>

	<th class="th-ins-voti">Data</th>

	<th class="th-ins-voti">Luogo</th>

	<th class="th-ins-voti">Testo nota disciplinare</th>



	</tr>



	<?php



	while($row = mysqli_fetch_assoc($result)){





			$id_s = $row['id'];





			$nome_s = $row['nome'];

			$cognome_s = $row['cognome'];



			$n++;



			$datepicker = $datapicker+n;



			echo "

			  <tr>

				<td class='td-ins-voti'>".$cognome_s."</td>

				<td class='td-ins-voti'>".$nome_s."</td>

				<td class='td-ins-data'><input class='data-pick' name='data' type='text' id='datepicker' required></td>



				<td class='td-ins-luogo'><input type='text' name='luogo' required></td>



				<td class='td-ins-textarea'><textarea name='nota' required></textarea></td>

			  </tr>

			";



	}//end while



?>

</table>

<button class='insvoto-button' type='submit' name='insNota'>Conferma</button>

</form>

</section>



<?php

	include '../includes/footer_registro_doc.php';

?>



</body>

</html>

