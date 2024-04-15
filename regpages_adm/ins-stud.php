<?php

	ob_start();

	include '../includes/header_registro_adm.php';

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



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



 	if(strpos($url,'error=empty') !== false){

 	echo"

	<div id='dialog' title='Error'>

	  <p>Compila tutti i campi richiesti.</p>

	</div>



	";

 	}

 	elseif(strpos($url,'error=username') !== false){

 			echo"

	<div id='dialog' title='Error'>

	  <p>Questo nome utente e' gia presente.</p>

	</div>



	";

 	}elseif(strpos($url,'error=psw') !== false){

 				echo"

	<div id='dialog' title='Error'>

	  <p>Le password devono corrispondere.</p>

	</div>



	";

 	}





		echo"

		<div class='form-box'>

		<form action='".addStud($conn)."' method='POST'>

			<input type='text' name='nome' placeholder='Nome' required>

			<input type='text' name='cognome' placeholder='Cognome' required>

		<select name='giorno' class='combo-box' required>

		<script>

			var day = 31;

			for(var i = 1; i < day; i++){

			   document.write('<option value='+i+'>'+i+'</option>');

			}

			</script>

			<option>31</option>

		</select>

		<select name='mese' class='combo-box' required>

			<option>Gennaio</option>

			<option>Febbraio</option>

			<option>Marzo</option>

			<option>Aprile</option>

			<option>Maggio</option>

			<option>Giugno</option>

			<option>Luglio</option>

			<option>Agosto</option>

			<option>Settembre</option>

			<option>Ottobre</option>

			<option>Novembre</option>

			<option>Dicembre</option>

		</select>

		<select name='anno' id='year' class='combo-box' required>

			<script>

			var myDate = new Date();

			var year = myDate.getFullYear();

			for(var i = 1900; i < year+1; i++){

			   document.write('<option value='+i+'>'+i+'</option>');

			}

			</script>

			</select><br>

		<select name='sesso' class='combo-box' required>

		  <option value='M'>M</option>

		  <option value='F'>F</option>

		</select>

			<input type='text' name='codfis' placeholder='Codice fiscale'>

		<select name='cittadinanza' class='combo-box' required>

		  <option value='italiana'>ITALIANA</option>

		  <option value='estera'>ESTERA</option>

		</select>

			<input type='text' name='comresidenza' placeholder='Comune di residenza'>

			<input type='text' name='provresidenza' placeholder='Provincia di residenza'>

			<input type='text' name='cap' placeholder='CAP'>

			<input type='text' name='via' placeholder='Via'>

			<input type='text' name='telefono' placeholder='Telefono'>



			<select class='combo-box' name='classe' required>

			";





		$result_c = mysqli_query($dbconn, "SELECT classe.classe,classe.sezione,classe.id FROM classe ORDER BY classe.classe ASC");





				while($row_c = mysqli_fetch_assoc($result_c)){

					$classe = $row_c['classe'];

					$sezione = $row_c['sezione'];

					$classe_nome_c = $classe.$sezione;

					echo"<option>".$classe_nome_c."</option>";

					}//end while



			echo"</select>

			<select name='anno_classe' class='combo-box' required>

			  <option>2016/2017</option>

			  <option>2017/2018</option>

			  <option>2018/2019</option>

			  <option>2019/2020</option>

			  <option>2020/2021</option>

			  <option>2021/2022</option>

			</select>

			<input type='text' name='username' placeholder='Username' required>

			<input type='password' name='password' placeholder='Password' required>

			<input type='password' name='conf_password' placeholder='Confirm password' required>

			<button class='main-button' type='submit' name='stud_createaccSubmit'>CREA</button>

		</form>

		</div>

		";



?>



</section>



<?php

	include '../includes/footer_registro_adm.php';

?>



</body>

</html>