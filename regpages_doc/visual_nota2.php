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

	$n=0;



	$idclass =  substr($url, strrpos($url, '=') + 1);



	$result = mysqli_query($dbconn, "SELECT studentenota.id,studentenota.data,studentenota.luogo,studentenota.testo_nota,studentenota.docente,studentenota.studente FROM studentenota INNER JOIN (accountStud INNER JOIN studenteclasse  ON (accountStud.id=studenteclasse.studente)) ON(accountStud.id = studentenota.studente) WHERE studenteclasse.classe = '$idclass' AND  studentenota.docente= '$ses_var_doc' ORDER BY studentenota.data DESC");



	if(mysqli_fetch_assoc($result)){

	?>

	<h1 class="title_doc">Elenco note disciplinari</h1>

	<table class="table-ins-voti">

		<tr class="tr-ins-voti">

		<th class="th-ins-voti">#</th>

		<th class="th-ins-voti">Cognome</th>

		<th class="th-ins-voti">Nome</th>

		<th class="th-ins-voti">Data</th>

		<th class="th-ins-voti">Luogo</th>

		<th  colspan="2" class="th-ins-voti">Testo nota</th>

		</tr>



	<?php



		$result_1 = mysqli_query($dbconn, "SELECT studentenota.id,studentenota.data,studentenota.luogo,studentenota.testo_nota,studentenota.docente,studentenota.studente FROM studentenota INNER JOIN (accountStud INNER JOIN studenteclasse  ON (accountStud.id=studenteclasse.studente)) ON(accountStud.id = studentenota.studente) WHERE studenteclasse.classe = '$idclass' AND  studentenota.docente= '$ses_var_doc' ORDER BY studentenota.data DESC");

		while($row = mysqli_fetch_assoc($result_1)){



		$studente= $row['studente'];





			$get_studenti= mysqli_query($dbconn, "SELECT * FROM dataStud WHERE id_accountStud = '$studente' ");



			$row2 = mysqli_fetch_assoc($get_studenti);



			$nome_s = $row2['nome'];

			$cognome_s = $row2['cognome'];





			$id= $row['id'];

			$data = $row['data'];

			$luogo = $row['luogo'];

			$nota = $row['testo_nota'];



		list($m,$d,$y) = explode('-',$data);



			$data_c = $y."/".$d."/".$m;



		$n++;

		echo "

			  <tr>

				<td class='td-ins-num'>".$n."</td>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$cognome_s."</td>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$nome_s."</td>

				<td class='td-ins-data' style='padding-left:10px;padding-right:10px;'>".$data_c."</td>

				<td class='td-ins-luogo' style='padding-left:10px;padding-right:10px;'>".$luogo."</td>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$nota."</td>

				<td class='td-ins-edit'><a href='visual_nota3.php?nota_id=".$id."'><img class='edit-pencil' src='../img/registro_img/edit_pencil.png'></a></td>

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

			  <p>Nessun studente di questa classe ha ricevuto una nota disciplinare da lei.</p>

			</div>



			";

	}



?>



</section>



<?php

	include '../includes/footer_registro_doc.php';

?>

  <div class="pad-box-classi"></div>

</body>

</html>