<?php

	ob_start();

	include '../includes/header_registro_adm.php';

?>



<section>

	<h1 class="title_doc">Elenco docenti</h1>

	<table class="table-elenco">

	<tr class="tr-ins-voti">

	<th class="th-ins-voti"></th>

	<th class="th-ins-voti">Cognome</th>

	<th class="th-ins-voti">Nome</th>

	<th class="th-ins-voti">Data di nascita</th>

	</tr>

	<?php



	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$ses_var_doc = $_SESSION["id_doc"];



	$result = mysqli_query($dbconn, "SELECT * FROM dataDoc ORDER BY dataDoc.cognome ASC");



	while($row = mysqli_fetch_assoc($result)){





			$nome = $row['nome'];

			$cognome = $row['cognome'];

			$datanascita = $row['datanascita'];

			$sesso = $row['sesso'];

			$codice_fiscale = $row['codicefiscale'];

			$cittadinanza = $row['cittadinanza'];

			$comres = $row['comuneresidenza'];

			$provres = $row['provinciaresidenza'];

			$cap = $row['cap'];

			$via = $row['via'];

			$tel = $row['telefono'];

			$id_foto = $row['id_accountDoc'];



			list($m,$d,$y) = explode('-',$datanascita);



			$datanascita_c = $y."/".$d."/".$m;



			$path_foto = "../foto_doc/".$id_foto.".jpg";



			echo "

			<tr>";

				if (file_exists($path_foto)) {

					echo "<td class='td-classi'><img src='../foto_doc/".$id_foto.".jpg' class='foto_tessera'></td>";

				} else {

					echo "<td class='td-classi'><img src='../img/registro_img/user.png' class='foto_tessera'></td>";

				}



			echo"

				<td class='td-classi'>".$cognome."</td>

				<td class='td-classi'>".$nome."</td>

				<td class='td-classi'>".$datanascita_c."</td>

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