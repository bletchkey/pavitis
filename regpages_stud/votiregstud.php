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

    <div class="pad-box-voti"></div>

<section>

	<?php

	$dbconn = mysqli_connect('localhost', 'root','');

	mysqli_select_db($dbconn, 'my_pavitis');



	$ses_var_stud = $_SESSION["id_stud"];



	$result = mysqli_query($dbconn, "SELECT * FROM studentevoto WHERE studente = '$ses_var_stud' ORDER BY materia ASC, data DESC");

	$result_materia = mysqli_query($dbconn, "SELECT * FROM materia");





	//ARRAY: TUTTE LE MATERIE

	$dataArray = array();



	while($row_materia = mysqli_fetch_array($result_materia)) {

		$dataArray[$row_materia['id']] = $row_materia['materia'];

	}



	if(mysqli_num_rows($result) != 0){

	//STAMPA VOTI

	while($row = mysqli_fetch_assoc($result)){





			$materia = $row['materia'];

			$voto_n = $row['voto_n'];

			$voto_s = $row['voto_scritto'];

			$data = $row['data'];

			$messaggio = $row['message'];



			list($m,$d,$y) = explode('-',$data);



			$data_c = $y."/".$d."/".$m;



			echo "

			<center>

			<div class='form-voti'>

				<center>



				<div class='text-materia'>&nbsp&nbsp".$dataArray[$materia]."</div>



				<div class='text-voti'>".$data_c."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp



				&nbsp&nbsp<div class='text-voti2'>( ".$voto_n." )&nbsp&nbsp".$voto_s."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div class='text-voti2'>".$messaggio."</div>



				</div>



				</center>

			</div>

			</center>

		";



	}//end while1



	}

	else{

	echo"

	<div id='dialog' title='Avviso'>

	  <p>Non sono presenti voti a tuo nome.</p>

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