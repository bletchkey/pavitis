<?php

	ob_start();

	include '../includes/header_registro_stud.php';

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

<section>
	<?php

	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$ses_var_stud = $_SESSION["id_stud"];



	$result_classe = mysqli_query($dbconn, "SELECT classe.id FROM classe INNER JOIN (studenteclasse INNER JOIN accountStud ON (accountStud.id = studenteclasse.studente)) ON (classe.id = studenteclasse.classe) WHERE studenteclasse.studente = '$ses_var_stud' ");



	$row_classe = mysqli_fetch_assoc($result_classe);



	$_SESSION["id_classe"] = $row_classe['id'];



	$id_c = $row_classe['id'];



	$result = mysqli_query($dbconn, "SELECT * FROM compiticlasse WHERE compiticlasse.classe = '$id_c' ORDER BY per DESC");

	$result_materia = mysqli_query($dbconn, "SELECT * FROM materia");





	//ARRAY: TUTTE LE MATERIE

	$dataArray = array();



	while($row_materia = mysqli_fetch_array($result_materia)) {

		$dataArray[$row_materia['id']] = $row_materia['materia'];

	}



	if(mysqli_num_rows($result) != 0){

	?>

	<h1 class="title_doc">Compiti assegnati</h1>

	<table class="table-compiti">

	<tr class="tr-ins-voti">

	<th class="th-ins-voti">Materia</th>

	<th class="th-ins-voti">Data assegnazione</th>

	<th class="th-ins-voti">Data consegna</th>

	<th class="th-ins-voti">Compito</th>

	</tr>



	<?php

	//STAMPA VOTI

	while($row = mysqli_fetch_assoc($result)){





			$materia = $row['materia'];

			$il = $row['il'];

			$per = $row['per'];

			$descrizione = $row['testo'];



			list($m,$d,$y) = explode('-',$il);



			$il_c = $y."/".$d."/".$m;



			list($m,$d,$y) = explode('-',$per);



			$per_c = $y."/".$d."/".$m;



			echo "

			  <tr>

				<td class='td-ins-voto'>".$dataArray[$materia]."</td>

				<td class='td-ins-voto'>".$il_c."</td>

				<td class='td-ins-voto'>".$per_c."</td>

				<td class='td-ins-voto'>".$descrizione."</td>



			  </tr>

			";





	}//end while1

	echo"</table>";

	}

	else{

	echo"

	<div id='dialog' title='Avviso'>

	  <p>Non sono presenti compiti assegnati alla tua classe.</p>

	</div>



	";

	}

?>

<div class="space-bottom-marks"></div>



</section>

<?php

	include '../includes/footer_registro_stud.php';

?>

</body>

</html>