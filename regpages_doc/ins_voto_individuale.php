<?php

	ob_start();

	include '../includes/header_registro_doc.php';

	session_start();

?>



<section>

	<h1 class="title_doc">Scegli la classe in cui e' presente lo studente</h1>

	<table class="table-ins-voti">

	<tr class="tr-ins-voti">

	<th class="th-ins-voti">classe</th>

	</tr>

	<?php

	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$ses_var_doc = $_SESSION["id_doc"];



	$result = mysqli_query($dbconn, "SELECT classe.classe,classe.sezione,classe.id FROM classe INNER JOIN ( docenteclasse INNER JOIN accountDoc ON (accountDoc.id=docenteclasse.docente)) ON (classe.id=docenteclasse.classe) WHERE docente = '$ses_var_doc' ORDER BY classe.classe ASC");



	while($row = mysqli_fetch_assoc($result)){





			$classe_id = $row['id'];

			$classe_n = $row['classe'];

			$classe_s = $row['sezione'];



			echo "

			<tr>

			<div class='form-classi'>

					<td class='td-classi'><a href='ins_voto_individuale2.php?class_id=".$classe_id."'><div class='text-classi'>".$classe_n."&nbsp".$classe_s."</div></a></td>

			</div>

			</tr>

		";



	}//end while



?>



</table>

<div class="space-bottom-marks"></div>

</section>



<?php

	include '../includes/footer_registro_doc.php';

?>

  <div class="pad-box-classi"></div>

</body>

</html>