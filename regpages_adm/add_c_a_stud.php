<?php

	ob_start();

	include '../includes/header_registro_adm.php';

?>



<section>

	<h1 class="title_doc">Seleziona opzioni</h1>

	<?php

	echo"

		<div class='form-box-doc-classes'>

		<form action='".addStudClasse($conn)."' method='POST'>





		<select class='combo-box' name='studente' required>

			";
		$result_s = mysqli_query($dbconn, "SELECT * FROM dataStud ORDER BY dataStud.cognome ASC");





				while($row_s = mysqli_fetch_assoc($result_s)){

					$nome = $row_s['nome'];

					$cognome = $row_s['cognome'];

					$id = $row_s['id_accountStud'];

					echo"<option value='$id'>".$cognome." ".$nome."</option>";

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

			  <option>2022/2023</option>

			  <option>2023/2024</option>

			  <option>2024/2025</option>

			</select>



			<button class='main-button' type='submit' name='addstudclasse_Submit'>CONFERMA</button>

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