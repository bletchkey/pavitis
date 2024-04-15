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

	$idclass =  substr($url, strrpos($url, '=') + 1);

	$result = mysqli_query($dbconn, "SELECT * FROM dataStud INNER JOIN ( accountStud INNER JOIN studenteclasse ON (accountStud.id=studenteclasse.studente)) ON (dataStud.id_accountStud=accountStud.id) WHERE studenteclasse.classe = '$idclass' ORDER BY dataStud.cognome ASC");

	if(mysqli_fetch_assoc($result)>0){
	?>
	<h1 class="title_doc">Inserisci il voto agli studenti</h1>
	<?php
	echo"

	<table class='table-ins-voti'>
	<tr class='tr-ins-voti'>
	<th class='th-ins-voti'>#</th>
	<th class='th-ins-voti'>Cognome</th>
	<th class='th-ins-voti'>Nome</th>
	<th class='th-ins-voti'>Data</th>
	<th class='th-ins-voti'>Materia</th>
	<th class='th-ins-voti'>Voto</th>
	<th class='th-ins-voti'>Commento pubblico</th>

	</tr>";

	$result_1 = mysqli_query($dbconn, "SELECT * FROM dataStud INNER JOIN ( accountStud INNER JOIN studenteclasse ON (accountStud.id=studenteclasse.studente)) ON (dataStud.id_accountStud=accountStud.id) WHERE studenteclasse.classe = '$idclass' ORDER BY dataStud.cognome ASC");

	while($row = mysqli_fetch_assoc($result_1)){
			$get_materie = mysqli_query($dbconn, "SELECT materia.materia FROM materia INNER JOIN materiadocente ON (materia.id=materiadocente.materia) WHERE materiadocente.docente = '$ses_var_doc' AND materiadocente.classe = '$idclass' ORDER BY materia.materia ASC");

			$id_s = $row['id'];
			$nome_s = $row['nome'];
			$cognome_s = $row['cognome'];

			$n++;

			$datepicker = $datapicker+n;

			echo "
			  <tr>
				<td class='td-ins-num'>".$n."</td>
				<td class='td-ins-voti'>".$cognome_s."</td>
				<td class='td-ins-voti'>".$nome_s."</td>
				<td class='td-ins-data'><input class='input-data' type='text'></td>
				<td class='td-ins-materia'><select class='combo-mat' name='materia'>	";
				while($row_m = mysqli_fetch_assoc($get_materie)){
					$materia = $row_m['materia'];
					echo"<option>".$materia."</option>";
					}//end while

				echo"</select></td>
				<td class='td-ins-voton'><select class='combo-voti' name='voto'>
				<option>1</option>
				<option>1.5</option>
				<option>2</option>
				<option>2.5</option>
				<option>3</option>
				<option>3.5</option>
				<option>4</option>
				<option>4.5</option>
				<option>5</option>
				<option>5.5</option>
				<option>6</option>
				<option>6.5</option>
				<option>7</option>
				<option>7.5</option>
				<option>8</option>
				<option>8.5</option>
				<option>9</option>
				<option>9.5</option>
				<option>10</option>
				</select></td>
				<td class='td-ins-textarea'><textarea name='message'></textarea></td>
			  </tr>
			";

	}//end while


?>
</table>
<div class='form-data-2'>
<p>Data generale: <input class="data-pick" type="text" id="datepicker"> <button class="data_gen_btn" onclick="">Imposta data</button></p>

</div>


<?php
}else
	{
		echo"
			<div id='dialog' title='Avviso'>
			  <p>Non sono presenti studenti in questa classe.</p>
			</div>

			";
	}

?>
<div class="space-bottom-marks"></div>
</section>

<?php
	include '../includes/footer_registro_doc.php';
?>
</body>
</html>
