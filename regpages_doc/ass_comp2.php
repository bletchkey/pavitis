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

	$id_classe_comp =  substr($url, strrpos($url, '=') + 1);

	$_SESSION["id_classe_compito"] = $id_classe_comp;

	$get_materie = mysqli_query($dbconn, "SELECT materia.materia FROM materia INNER JOIN materiadocente ON (materia.id=materiadocente.materia) WHERE materiadocente.docente = '$ses_var_doc'AND materiadocente.classe = '$id_classe_comp' ORDER BY materia.materia ASC");

	echo"<form action='".insCompito($conn)."' method='POST'>";

	?>
	<h1 class="title_doc">Assegna compito</h1>
	<table class="table-ins-voti">
	<tr class="tr-ins-voti">
	<th class="th-ins-voti">Data di consegna</th>
	<th class="th-ins-voti">Materia</th>
	<th class="th-ins-voti">Descrizione compito</th>
	</tr>

	<?php


	echo "
	  <tr>
		<td class='td-ins-data'><input class='data-pick' name='data' type='text' id='datepicker' required></td>

		<td class='td-ins-materia'><select class='combo-mat' name='materia' required>	";
		while($row_m = mysqli_fetch_assoc($get_materie)){
			$materia = $row_m['materia'];
			echo"<option>".$materia."</option>";
			}//end while

		echo"</select></td>

		<td class='td-ins-textarea'><textarea name='descrizione' required></textarea></td>
	  </tr>
	";


?>
</table>
<button class='insvoto-button' type='submit' name='insCompito'>Conferma</button>
</form>
<div class="space-bottom-marks"></div>
</section>

<?php
	include '../includes/footer_registro_doc.php';
?>

</body>
</html>
