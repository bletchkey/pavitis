<?php
	ob_start();
	include '../includes/header_registro_stud.php';
?>

<section>
 <h1 class="title_doc">I tuoi dati anagrafici</h1>
<?php
	$dbconn = mysqli_connect('localhost', 'root','');
	mysqli_select_db($dbconn, 'my_pavitis');

	$ses_var_stud = $_SESSION["id_stud"];

	$result = mysqli_query($dbconn, "SELECT * FROM dataStud WHERE id_accountStud = '$ses_var_stud' ");

	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);

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

	list($m,$d,$y) = explode('-',$datanascita);

	$datanascita_c = $y."/".$d."/".$m;

    echo "
	<div class='form-dati-anagrafici'>
		<center><div class='text-dati-anag1'>Nome:&nbsp&nbsp<div class='text-dati-anag2'>".$nome."</div></div><br>
		<div class='text-dati-anag1'>Cognome:&nbsp&nbsp<div class='text-dati-anag2'>".$cognome."</div></div><br>
		<div class='text-dati-anag1'>Data di nascita:&nbsp&nbsp<div class='text-dati-anag2'>".$datanascita_c."</div></div><br>
		<div class='text-dati-anag1'>Sesso:&nbsp&nbsp<div class='text-dati-anag2'>".$sesso."</div></div><br>
		<div class='text-dati-anag1'>Codice fiscale:&nbsp&nbsp<div class='text-dati-anag2'>".$codice_fiscale."</div></div><br>
		<div class='text-dati-anag1'>Cittadinanza:&nbsp&nbsp<div class='text-dati-anag2'>".$cittadinanza."</div></div><br>
		<div class='text-dati-anag1'>Comune di residenza:&nbsp&nbsp<div class='text-dati-anag2'>".$comres."</div></div><br>
		<div class='text-dati-anag1'>Provincia di residenza:&nbsp&nbsp<div class='text-dati-anag2'>".$provres."</div></div><br>
		<div class='text-dati-anag1'>CAP:&nbsp&nbsp<div class='text-dati-anag2'>".$cap."</div></div><br>
		<div class='text-dati-anag1'>Via:&nbsp&nbsp<div class='text-dati-anag2'>".$via."</div></div><br>
		<div class='text-dati-anag1'>Recapito telefonico:&nbsp&nbsp<div class='text-dati-anag2'>".$tel."</div></div></center>
	</div>
	";

?>

</section>

<?php
	include '../includes/footer_registro_stud.php';
?>

</body>
</html>