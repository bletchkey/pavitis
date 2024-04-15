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



		$id_studente =  substr($url, strrpos($url, '=') + 1);

		$_SESSION['id_studente_modifica_dati'] = $id_studente;



		$get_dataStud = mysqli_query($dbconn, "SELECT * FROM dataStud WHERE id_accountStud = '$id_studente' ");





		if (mysqli_num_rows($get_dataStud) > 0)

		{

			$row = mysqli_fetch_assoc($get_dataStud);



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

		}



		list($y,$m,$d) = explode('-',$datanascita);



		$datanascita_c = $d."/".$m."/".$y;





		/*<script>

			var day = 31;

			for(var i = 1; i < day; i++){

			   document.write('<option value='+i+'>'+i+'</option>');

			}

			</script>

		<option>31</option>*/



		echo"

		<div class='form-box'>

		<form action='".editStud($conn)."' method='POST'>
			<input type='text' name='nome' placeholder='Nome' value='".$nome."' required>

		<input type='text' name='cognome' placeholder='Cognome' value='".$cognome."' required>

		<select name='giorno' class='combo-box' required>";?>

			<option value='1' <?php if ($d == 1) echo ' selected="selected"'; ?>>1</option>

			<option value='2' <?php if ($d == 2) echo ' selected="selected"'; ?>>2</option>

			<option value='3' <?php if ($d == 3) echo ' selected="selected"'; ?>>3</option>

			<option value='4' <?php if ($d == 4) echo ' selected="selected"'; ?>>4</option>

			<option value='5' <?php if ($d == 5) echo ' selected="selected"'; ?>>5</option>

			<option value='6' <?php if ($d == 6) echo ' selected="selected"'; ?>>6</option>

			<option value='7' <?php if ($d == 7) echo ' selected="selected"'; ?>>7</option>

			<option value='8' <?php if ($d == 8) echo ' selected="selected"'; ?>>8</option>

			<option value='9' <?php if ($d == 9) echo ' selected="selected"'; ?>>9</option>

			<option value='10' <?php if ($d == 10) echo ' selected="selected"'; ?>>10</option>

			<option value='11' <?php if ($d == 11) echo ' selected="selected"'; ?>>11</option>

			<option value='12' <?php if ($d == 12) echo ' selected="selected"'; ?>>12</option>

			<option value='13' <?php if ($d == 13) echo ' selected="selected"'; ?>>13</option>

			<option value='14' <?php if ($d == 14) echo ' selected="selected"'; ?>>14</option>

			<option value='15' <?php if ($d == 15) echo ' selected="selected"'; ?>>15</option>

			<option value='16' <?php if ($d == 16) echo ' selected="selected"'; ?>>16</option>

			<option value='17' <?php if ($d == 17) echo ' selected="selected"'; ?>>17</option>

			<option value='18' <?php if ($d == 18) echo ' selected="selected"'; ?>>18</option>

			<option value='19' <?php if ($d == 19) echo ' selected="selected"'; ?>>19</option>

			<option value='20' <?php if ($d == 20) echo ' selected="selected"'; ?>>20</option>

			<option value='21' <?php if ($d == 21) echo ' selected="selected"'; ?>>21</option>

			<option value='22' <?php if ($d == 22) echo ' selected="selected"'; ?>>22</option>

			<option value='23' <?php if ($d == 23) echo ' selected="selected"'; ?>>23</option>

			<option value='24' <?php if ($d == 24) echo ' selected="selected"'; ?>>24</option>

			<option value='25' <?php if ($d == 25) echo ' selected="selected"'; ?>>25</option>

			<option value='26' <?php if ($d == 26) echo ' selected="selected"'; ?>>26</option>

			<option value='27' <?php if ($d == 27) echo ' selected="selected"'; ?>>27</option>

			<option value='28' <?php if ($d == 28) echo ' selected="selected"'; ?>>28</option>

			<option value='29' <?php if ($d == 29) echo ' selected="selected"'; ?>>29</option>

			<option value='30' <?php if ($d == 30) echo ' selected="selected"'; ?>>30</option>

			<option value='31' <?php if ($d == 31) echo ' selected="selected"'; ?>>31</option>

		<?php echo"</select>

		<select name='mese' class='combo-box' required>";?>

			<option value='1' <?php if ($m == 1) echo ' selected="selected"'; ?>>Gennaio</option>

			<option value='2' <?php if ($m == 2) echo ' selected="selected"'; ?>>Febbraio</option>

			<option value='3' <?php if ($m == 3) echo ' selected="selected"'; ?>>Marzo</option>

			<option value='4' <?php if ($m == 4) echo ' selected="selected"'; ?>>Aprile</option>

			<option value='5' <?php if ($m == 5) echo ' selected="selected"'; ?>>Maggio</option>

			<option value='6' <?php if ($m == 6) echo ' selected="selected"'; ?>>Giugno</option>

			<option value='7' <?php if ($m == 7) echo ' selected="selected"'; ?>>Luglio</option>

			<option value='8' <?php if ($m == 8) echo ' selected="selected"'; ?>>Agosto</option>

			<option value='9' <?php if ($m == 9) echo ' selected="selected"'; ?>>Settembre</option>

			<option value='10' <?php if ($m == 10) echo ' selected="selected"'; ?>>Ottombre</option>

			<option value='11' <?php if ($m == 11) echo ' selected="selected"'; ?>>Novembre</option>

			<option value='12' <?php if ($m == 12) echo ' selected="selected"'; ?>>Dicembre</option>

		</select>

		<select name='anno' id='year' class='combo-box' required>

			<?php

			for($i=date('Y'); $i>1899; $i--) {

				$selected = '';

				if ($y == $i) $selected = ' selected="selected"';

				print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");

			}

		echo"</select><br>

		<select name='sesso' class='combo-box' required>";?>

		  <option value='M'<?php if ($sesso == "M") echo ' selected="selected"'; ?>>M</option>

		  <option value='F'<?php if ($sesso == "F") echo ' selected="selected"'; ?>>F</option>

		<?php echo"</select>

			<input type='text' name='codfis' placeholder='Codice fiscale' value='".$codice_fiscale."'>

		<select name='cittadinanza' class='combo-box' value='".$cittadinanza."'required>

		  <option value='italiana'>ITALIANA</option>

		  <option value='estera'>ESTERA</option>

		</select>

			<input type='text' name='comresidenza' placeholder='Comune di residenza' value='".$comres."'>

			<input type='text' name='provresidenza' placeholder='Provincia di residenza' value='".$provres."'>

			<input type='text' name='cap' placeholder='CAP' value='".$cap."'>

			<input type='text' name='via' placeholder='Via' value='".$via."'>

			<input type='text' name='telefono' placeholder='Telefono' value='".$tel."'>





			<button class='main-button' type='submit' name='stud_editaccSubmit'>CONFERMA MODIFICHE</button>

		</form>

		</div>

		";

/*<select class='combo-box' name='classe' required>

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

			</select>			*/

?>





</section>



<?php

	include '../includes/footer_registro_adm.php';

?>



</body>

</html>