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



	$result = mysqli_query($dbconn, "SELECT dataStud.id_accountStud,dataStud.id,dataStud.nome,dataStud.cognome FROM dataStud INNER JOIN ( accountStud INNER JOIN studenteclasse ON (accountStud.id=studenteclasse.studente)) ON (dataStud.id_accountStud=accountStud.id) WHERE studenteclasse.classe = '$idclass' ORDER BY dataStud.cognome ASC");

	if(mysqli_fetch_assoc($result)){

	?>

	<h1 class="title_doc">Scegli lo studente</h1>

	<table class="table-ins-voti">

	<tr class="tr-ins-voti">

	<th class="th-ins-voti">#</th>

	<th class="th-ins-voti">Cognome</th>

	<th class="th-ins-voti">Nome</th>

	<th class="th-ins-voti"></th>



	</tr>



	<?php

	$result_1 = mysqli_query($dbconn, "SELECT dataStud.id_accountStud,dataStud.id,dataStud.nome,dataStud.cognome FROM dataStud INNER JOIN ( accountStud INNER JOIN studenteclasse ON (accountStud.id=studenteclasse.studente)) ON (dataStud.id_accountStud=accountStud.id) WHERE studenteclasse.classe = '$idclass' ORDER BY dataStud.cognome ASC");

	while($row = mysqli_fetch_assoc($result_1)){





			$id_s = $row['id'];

			$id_stud = $row['id_accountStud'];

			$nome_s = $row['nome'];

			$cognome_s = $row['cognome'];



			$n++;



			$datepicker = $datapicker+n;



			echo "

			  <tr>

				<td class='td-ins-num'>".$n."</td>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$cognome_s."</td>

				<td class='td-ins-voti' style='padding-left:10px;padding-right:10px;'>".$nome_s."</td>

				<td class='td-ins-edit' style='padding-left:10px;padding-right:10px;'><a href='nota3.php?studid=".$id_stud."'><img class='edit-pencil' src='../img/registro_img/aggiungi_acc.png'></a></td>

			  </tr>

			";



	}//end while

	}else

	{

		echo"

			<div id='dialog' title='Avviso'>

			  <p>Non sono presenti studenti in questa classe.</p>

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

