<?php

	ob_start();

	include '../includes/header_registro_stud.php';

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

  <div class="pad-box-voti"></div>

<section>

    <?php

	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$ses_var_stud = $_SESSION["id_stud"];



	$result = mysqli_query($dbconn, "SELECT * FROM studentenota WHERE studente = '$ses_var_stud' ORDER BY data DESC");





if(mysqli_num_rows($result) != 0){

	//STAMPA VOTI

	while($row = mysqli_fetch_assoc($result)){





			$docente = $row['docente'];

			$luogo = $row['luogo'];

			$data = $row['data'];

			$nota = $row['testo_nota'];



			$result_docs = mysqli_query($dbconn, "SELECT * FROM dataDoc WHERE id_accountDoc = '$docente'");

			$row_docs = mysqli_fetch_assoc($result_docs);



			$docente_cognome = $row_docs['cognome'];

			$docente_nome = $row_docs['nome'];



			list($m,$d,$y) = explode('-',$data);



			$data_c = $y."/".$d."/".$m;



			echo "

			<center>

			<div class='form-voti'>

				<center>



				<div class='text-materia'>&nbsp&nbsp Nota ricevuta dal docente: ".$docente_cognome." ".$docente_nome."</div>



				<div class='text-voti'>".$data_c."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp



				&nbsp&nbsp<div class='text-voti2'>( ".$luogo." )&nbsp&nbsp<div class='text-voti2'>".$nota."</div>



				</div>



				</center>

			</div>

			</center>

		";



	}//end while



	}

	else{

	echo"

	<div id='dialog' title='Avviso'>

	  <p>Non sono presenti note disciplinari a tuo nome.</p>

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