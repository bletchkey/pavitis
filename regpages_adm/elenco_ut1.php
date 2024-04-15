<?php
	ob_start();
	include '../includes/header_registro_adm.php';
?>

<section>
	<h1 class="title_doc">Scegli che categoria di utenti vuoi visualizzare</h1>
	<div class='form-elenco-utenti'>	
	<a href="elenco_stud.php">Studenti</a><br>
	<a href="elenco_doc.php">Docenti</a><br>
	<a href="elenco_adm.php">Amministratori</a>
	</div>
</section>

<?php
	include '../includes/footer_registro_adm.php';
?>
     
</body>
</html> 