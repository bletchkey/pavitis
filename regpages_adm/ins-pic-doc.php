<?php

	ob_start();

	include '../includes/header_registro_adm.php';

?>

<section>



	<?php

	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');


	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



	$ses_var_adm = $_SESSION["id_adm"];



	$n=0;

	$result = mysqli_query($dbconn, "SELECT dataDoc.id_accountDoc,dataDoc.id,dataDoc.nome,dataDoc.cognome FROM dataDoc ORDER BY dataDoc.cognome ASC");

	if(mysqli_fetch_assoc($result)){

	?>

	<h1 class="title_doc">Scegli il docente a cui vuoi modificare/caricare la foto di profilo</h1>

	<table class="table-ins-voti">

	<tr class="tr-ins-voti">

	<th class="th-ins-voti">#</th>

	<th class="th-ins-voti">Cognome</th>

	<th class="th-ins-voti">Nome</th>

	<th class="th-ins-voti"><th>



	</tr>



	<?php

	$result_1 = mysqli_query($dbconn, "SELECT dataDoc.id_accountDoc,dataDoc.id,dataDoc.nome,dataDoc.cognome FROM dataDoc ORDER BY dataDoc.cognome ASC");

	while($row = mysqli_fetch_assoc($result_1)){





			$id_d = $row['id'];

			$id_doc = $row['id_accountDoc'];

			$nome_d = $row['nome'];

			$cognome_d = $row['cognome'];



			$n++;



			echo "

			  <tr>

				<td class='td-ins-num'>".$n."</td>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$cognome_d."</td>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$nome_d."</td>

				<td class='td-ins-edit' style='padding-left:10px;padding-right:10px;'><a href='ins-pic-doc2.php?docid=".$id_doc."'><img class='edit-pencil' src='../img/registro_img/aggiungi_acc.png'></a></td>

			  </tr>

			";



	}//end while

	}else

	{

		echo"

			<div id='dialog' title='Avviso'>

			  <p>Non sono presenti docenti.</p>

			</div>



			";

	}



?>

</table>

<div class="space-bottom-marks"></div>

</section>



<?php

	include '../includes/footer_registro_doc.php';

?>



</body>

</html>