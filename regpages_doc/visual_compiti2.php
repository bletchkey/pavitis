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



<section>



	<?php

	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



	$ses_var_doc = $_SESSION["id_doc"];

	$n=0;



	$idclass =  substr($url, strrpos($url, '=') + 1);

	$_SESSION['id_classe_compito'] = $idclass;



	$result = mysqli_query($dbconn, "SELECT compiticlasse.id,compiticlasse.il,compiticlasse.per,compiticlasse.testo,compiticlasse.materia,compiticlasse.classe FROM compiticlasse INNER JOIN classe ON (classe.id=compiticlasse.classe) WHERE compiticlasse.classe = '$idclass' AND  compiticlasse.docente= '$ses_var_doc' ORDER BY compiticlasse.per DESC");

	$result_materia = mysqli_query($dbconn, "SELECT * FROM materia");





	//ARRAY: TUTTE LE MATERIE

	$dataArray = array();



	while($row_materia = mysqli_fetch_array($result_materia)) {

		$dataArray[$row_materia['id']] = $row_materia['materia'];

	}



	if(mysqli_fetch_assoc($result)){

	?>

	<h1 class="title_doc">Elenco compiti assegnati</h1>

	<table class="table-ins-voti">

		<tr class="tr-ins-voti">

		<th class="th-ins-voti">Materia</th>

		<th class="th-ins-voti">Data assegnazione</th>

		<th class="th-ins-voti">Data consegna</th>

		<th class="th-ins-voti">Compito</th>

		<th class="th-ins-voti"></th>

		</tr>



	<?php



		$result_1 = mysqli_query($dbconn, "SELECT compiticlasse.id,compiticlasse.il,compiticlasse.per,compiticlasse.testo,compiticlasse.materia,compiticlasse.classe FROM compiticlasse INNER JOIN classe ON (classe.id=compiticlasse.classe) WHERE compiticlasse.classe = '$idclass' AND  compiticlasse.docente= '$ses_var_doc' ORDER BY compiticlasse.per DESC");

		while($row = mysqli_fetch_assoc($result_1)){



			$id= $row['id'];

			$data_ass = $row['il'];

			$data_con = $row['per'];

			$descrizione = $row['testo'];

			$materia = $row['materia'];



		list($m,$d,$y) = explode('-',$data_ass);



		$data_ass_c = $y."/".$d."/".$m;



		list($m,$d,$y) = explode('-',$data_con);



		$data_con_c = $y."/".$d."/".$m;



		echo "

			  <tr>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$dataArray[$materia]."</td>

				<td class='td-ins-data' style='padding-left:10px;padding-right:10px;'>".$data_ass_c."</td>

				<td class='td-ins-luogo' style='padding-left:10px;padding-right:10px;'>".$data_con_c."</td>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$descrizione."</td>

				<td class='td-ins-edit'><a href='visual_compiti3.php?compito_id=".$id."'><img class='edit-pencil' src='../img/registro_img/edit_pencil.png'></a></td>

			  </tr>

			";



		}//end while



	?>

	</table>







	<?php

}else

	{

		echo"

			<div id='dialog' title='Avviso'>

			  <p>Non hai assegnato compiti in questa classe.</p>

			</div>



			";

	}



?>

<div class="space-bottom-marks"></div>

</section>



<?php

	include '../includes/footer_registro_doc.php';

?>

  <div class="pad-box-classi"></div>

</body>

</html>