<?php

	ob_start();

	include '../includes/header_registro_adm.php';

?>

<section>

	<h1 class="title_doc">Scegli la classe</h1>

	<table class="table-ins-voti">

	<tr class="tr-ins-voti">

	<th class=mysqli_queryi">classe</th>

	</tr>

	<?php

	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$ses_var_adm = $_SESSION["id_adm"];



	$result = mysqli_query($dbconn, "SELECT classe.classe,classe.sezione,classe.id FROM classe ORDER BY classe.classe ASC");



	while($row = mysqli_fetch_assoc($result)){





			$classe_id = $row['id'];

			$classe_n = $row['classe'];

			$classe_s = $row['sezione'];



			echo "

			<tr>

			<div class='form-classi'>

					<td class='td-classi'><a href='v_docs_adm_2.php?class_id=".$classe_id."'><div class='text-classi'>".$classe_n."&nbsp".$classe_s."</div></a></td>

			</div>

			</tr>

		";



	}//end while



?>



</table>

<div class="space-bottom-marks"></div>

</section>





<?php

	include '../includes/footer_registro_adm.php';

?>



</body>

</html>