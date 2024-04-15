<?php

	ob_start();

	include '../includes/header_registro_adm.php';

?>



<section>

	<h1 class="title_doc">Seleziona opzioni</h1>

	<?php


	echo"

		<div class='form-box-doc-classes'>

		<form action='".insDocClasses($conn)."' method='POST'>





		<select class='combo-box' name='docente' required>

			";

		$result_d = mysqli_query($dbconn, "SELECT * FROM dataDoc ORDER BY dataDoc.cognome ASC");





				while($row_d = mysqli_fetch_assoc($result_d)){

					$nome = $row_d['nome'];

					$cognome = $row_d['cognome'];

					$id = $row_d['id_accountDoc'];

					echo"<option value='$id'>".$cognome." ".$nome."</option>";
					}//end while



			echo"</select><br>





		<select class='combo-box' name='materia' id='id_doc' required>

			";





		$result_m = mysqli_query($dbconn, "SELECT * FROM materia ORDER BY materia.materia ASC");





				while($row_m = mysqli_fetch_assoc($result_m)){

					$nome_mat = $row_m['materia'];

					$id = $row_m['id'];



					echo"<option>".$nome_mat."</option>";

					}//end while



			echo"</select><br>





		<select class='combo-box' name='classe' required>

			";





		$result_c = mysqli_query($dbconn, "SELECT classe.classe,classe.sezione,classe.id FROM classe ORDER BY classe.classe ASC");





				while($row_c = mysqli_fetch_assoc($result_c)){

					$classe = $row_c['classe'];

					$sezione = $row_c['sezione'];

					$classe_nome_c = $classe.$sezione;

					echo"<option>".$classe_nome_c."</option>";

					}//end while



			echo"</select><br>





			<select name='anno_classe' class='combo-box' required>

			  <option>2016/2017</option>

			  <option>2017/2018</option>

			  <option>2018/2019</option>

			  <option>2019/2020</option>

			  <option>2020/2021</option>

			  <option>2021/2022</option>

			</select>



			<button class='main-button' type='submit' name='ins_doc_classes'>CONFERMA</button>

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