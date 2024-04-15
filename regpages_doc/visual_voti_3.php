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

	$idvoto =  substr($url, strrpos($url, '=') + 1);

	$_SESSION["id_voto_ed"] = $idvoto;
	$id_class = $_SESSION['id_classe_mat_voti'];

	//$result = mysqli_query($dbconn, "SELECT * FROM dataStud INNER JOIN ( accountStud INNER JOIN studenteclasse ON (accountStud.id=studenteclasse.studente)) ON (dataStud.id_accountStud=accountStud.id) WHERE studenteclasse.studente = '$idstud' ORDER BY dataStud.cognome ASC");
	$get_materie = mysqli_query($dbconn, "SELECT materia.materia FROM materia INNER JOIN materiadocente ON (materia.id=materiadocente.materia) WHERE materiadocente.docente = '$ses_var_doc' AND materiadocente.classe = '$id_class' ORDER BY materia.materia ASC");
	$get_voto = mysqli_query($dbconn, "SELECT * FROM studentevoto WHERE id = '$idvoto'");
	//$get_voto = mysqli_query($dbconn, "SELECT * FROM studentevoto INNER JOIN ( accountStud INNER JOIN studenteclasse ON (accountStud.id=studenteclasse.studente)) ON (studentevoto.studente=accountStud.id) WHERE studenteclasse.studente = '$idstud' ORDER BY dataStud.cognome ASC");


	echo"<form action='".editVoto($conn)."' method='POST'>";

	?>
	<h1 class="title_doc">Modifica voto</h1>
	<table class="table-ins-voti">
	<tr class="tr-ins-voti">
	<th class="th-ins-voti">Cognome</th>
	<th class="th-ins-voti">Nome</th>
	<th class="th-ins-voti">Data</th>
	<th class="th-ins-voti">Materia</th>
	<th class="th-ins-voti">Voto</th>
	<th class="th-ins-voti">Commento pubblico</th>

	</tr>

	<?php

			$row = mysqli_fetch_assoc($get_voto);

			$id_voto = $row['id'];
			$data = $row['data'];

			list($m,$d,$y) = explode('-',$data);

			$data_c = $y."/".$d."/".$m;

			$commento = $row['message'];
			$voto_n = $row['voto_n'];

			$id_edit_stud = $row['studente'];

			$result = mysqli_query($dbconn, "SELECT dataStud.nome,dataStud.cognome FROM dataStud WHERE id_accountStud = '$id_edit_stud'");
			$row2 = mysqli_fetch_assoc($result);

			$nome_stud = $row2['nome'];
			$cognome_stud = $row2['cognome'];

			$n++;

			echo "
			  <tr>
				<td class='td-ins-voti'>".$cognome_stud."</td>
				<td class='td-ins-voti'>".$nome_stud."</td>
				<td class='td-ins-data'>".$data_c."</td>

				<td class='td-ins-materia'><select class='combo-mat' name='materia' required>	";
				while($row_m = mysqli_fetch_assoc($get_materie)){
					$materia = $row_m['materia'];
					echo"<option>".$materia."</option>";
					}//end while

				?>
				</select></td>

				<td class='td-ins-voton'><select class='combo-voti' id='select_voti' name='voto' required>
				<option value='1' <?php if ($voto_n == 1) echo ' selected="selected"'; ?>>1</option>
				<option value='1.5' <?php if ($voto_n == 1.5) echo ' selected="selected"'; ?>>1.5</option>
				<option value='2' <?php if ($voto_n == 2) echo ' selected="selected"'; ?>>2</option>
				<option value='2.5' <?php if ($voto_n == 2.5) echo ' selected="selected"'; ?>>2.5</option>
				<option value='3' <?php if ($voto_n == 3) echo ' selected="selected"'; ?>>3</option>
				<option value='3.5' <?php if ($voto_n == 3.5) echo ' selected="selected"'; ?>>3.5</option>
				<option value='4' <?php if ($voto_n == 4) echo ' selected="selected"'; ?>>4</option>
				<option value='4.5' <?php if ($voto_n == 4.5) echo ' selected="selected"'; ?>>4.5</option>
				<option value='5' <?php if ($voto_n == 5) echo ' selected="selected"'; ?>>5</option>
				<option value='5.5' <?php if ($voto_n == 5.5) echo ' selected="selected"'; ?>>5.5</option>
				<option value='6' <?php if ($voto_n == 6) echo ' selected="selected"'; ?>>6</option>
				<option value='6.5' <?php if ($voto_n == 6.5) echo ' selected="selected"'; ?>>6.5</option>
				<option value='7' <?php if ($voto_n == 7) echo ' selected="selected"'; ?>>7</option>
				<option value='7.5' <?php if ($voto_n == 7.5) echo ' selected="selected"'; ?>>7.5</option>
				<option value='8' <?php if ($voto_n == 8) echo ' selected="selected"'; ?>>8</option>
				<option value='8.5' <?php if ($voto_n == 8.5) echo ' selected="selected"'; ?>>8.5</option>
				<option value='9' <?php if ($voto_n == 9) echo ' selected="selected"'; ?>>9</option>
				<option value='9.5' <?php if ($voto_n == 9.5) echo ' selected="selected"'; ?>>9.5</option>
				<option value='10' <?php if ($voto_n == 10) echo ' selected="selected"'; ?>>10</option>
				</select></td>
				<?php
				echo "<td class='td-ins-textarea2'><textarea name='message'>".$commento."</textarea></td>";
				?>
			  </tr>


</table>
<button class='insvoto-button' type='submit' name='editVoto'>Conferma</button>
<button class='insvoto-button' type='submit' name='delVoto'>Elimina voto</button>
</form>

</section>

<?php
	include '../includes/footer_registro_doc.php';
?>

</body>
</html>
