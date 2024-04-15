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


	$idnota =  substr($url, strrpos($url, '=') + 1);



	$_SESSION["id_nota_ed"] = $idnota;



	$get_nota = mysqli_query($dbconn, "SELECT * FROM studentenota WHERE id = '$idnota'");



	echo"<form action='".editNota($conn)."' method='POST'>";



	?>

	<h1 class="title_doc">Modifica nota disciplinare</h1>

	<table class="table-ins-voti">

	<tr class="tr-ins-voti">

	<th class="th-ins-voti">Alunno</th>

	<th class="th-ins-voti">Data</th>

	<th class="th-ins-voti">Luogo</th>

	<th class="th-ins-voti">Nota</th>



	</tr>





	<?php



	$row = mysqli_fetch_assoc($get_nota);



		$id_nota = $row['id'];

		$data = $row['data'];

		$luogo = $row['luogo'];

		$nota = $row['testo_nota'];



		list($m,$d,$y) = explode('-',$data);

		$data_c = $y."/".$d."/".$m;



		$id_edit_stud = $row['studente'];



		$result = mysqli_query($dbconn, "SELECT dataStud.nome,dataStud.cognome FROM dataStud WHERE id_accountStud = '$id_edit_stud'");

		$row2 = mysqli_fetch_assoc($result);



		$nome_stud = $row2['nome'];

		$cognome_stud = $row2['cognome'];





		echo "

		  <tr>

			<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$cognome_stud." ".$nome_stud."</td>

			<td class='td-ins-data'><input class='data-pick' name='data' value='".$data_c."' type='text' id='datepicker' required></td>



			<td class='td-ins-luogo'><input type='text' name='luogo' value='".$luogo."' required></td>



			<td class='td-ins-textarea2'><textarea name='nota' required>".$nota."</textarea></td>

		  </tr>

		";



	?>



</table>

<button class='insvoto-button' type='submit' name='editNota'>Conferma</button>

<button class='insvoto-button' type='submit' name='delNota'>Elimina nota disciplinare</button>

</form>



</section>



<?php

	include '../includes/footer_registro_doc.php';

?>

  <div class="pad-box-classi"></div>

</body>

</html>