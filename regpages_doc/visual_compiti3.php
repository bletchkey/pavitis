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
                $("#datepicker1").datepicker();

           });
  </script>

     <script>
  $.datepicker.setDefaults({
                dateFormat: 'dd/mm/yy'
           });
           $(function(){
                $("#datepicker2").datepicker();

           });
  </script>
<section>


	<?php
	$dbconn = mysqli_connect('localhost', 'root','');
	mysqli_select_db($dbconn, 'my_pavitis');

	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url

	$ses_var_doc = $_SESSION["id_doc"];

	$idcompito =  substr($url, strrpos($url, '=') + 1);

	$_SESSION["id_compito"] = $idcompito;
    $id_class = $_SESSION['id_classe_compito'];

	$get_compito = mysqli_query($dbconn, "SELECT * FROM compiticlasse WHERE id = '$idcompito'");
	$get_materie = mysqli_query($dbconn, "SELECT materia.materia FROM materia INNER JOIN materiadocente ON (materia.id=materiadocente.materia) WHERE materiadocente.docente = '$ses_var_doc' AND materiadocente.classe = '$id_class' ORDER BY materia.materia ASC");
	//ARRAY: TUTTE LE MATERIE
	$dataArray = array();

	while($row_materia = mysqli_fetch_array($result_materia)) {
		$dataArray[$row_materia['id']] = $row_materia['materia'];
	}

	echo"<form action='".editCompito($conn)."' method='POST'>";

	?>
	<h1 class="title_doc">Modifica compito</h1>
	<table class="table-ins-voti">
	<tr class="tr-ins-voti">
	<th class="th-ins-voti">Materia</th>
	<th class="th-ins-voti">Data assegnazione</th>
	<th class="th-ins-voti">Data consegna</th>
	<th class="th-ins-voti">Compito</th>

	</tr>


	<?php

		$row = mysqli_fetch_assoc($get_compito);

		$id_compito = $row['id'];
		$data_ass = $row['il'];
		$data_con = $row['per'];
		$materia = $row['materia'];
		$descrizione = $row['testo'];
		$id_edit_classe = $row['classe'];

		list($m,$d,$y) = explode('-',$data_ass);
		$data_ass_c = $y."/".$d."/".$m;

		list($m,$d,$y) = explode('-',$data_con);
		$data_con_c = $y."/".$d."/".$m;

		echo "
		  <tr>
			<td class='td-ins-materia'><select class='combo-mat' name='materia' required>	";
				while($row_m = mysqli_fetch_assoc($get_materie)){
					$materia = $row_m['materia'];
					echo"<option>".$materia."</option>";
					}//end while

				echo"</select></td>
			<td class='td-ins-data'><input class='data-pick' name='data_ass' value='".$data_ass_c."' type='text' id='datepicker1' required></td>
			<td class='td-ins-data'><input class='data-pick' name='data_con' value='".$data_con_c."' type='text' id='datepicker2' required></td>
			<td class='td-ins-textarea2'><textarea name='descrizione' required>".$descrizione."</textarea></td>
		  </tr>
		";

	?>

</table>
<button class='insvoto-button' type='submit' name='editCompito'>Conferma</button>
<button class='insvoto-button' type='submit' name='delCompito'>Elimina compito</button>
</form>

</section>

<?php
	include '../includes/footer_registro_doc.php';
?>
  <div class="pad-box-classi"></div>
</body>
</html>