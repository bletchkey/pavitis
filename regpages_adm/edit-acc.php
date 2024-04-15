<?php
	ob_start();
	include '../includes/header_registro_adm.php';
?>

<section>
	<h1 class="title_doc">Scegli il tipo di account da modificare</h1>
	<div class='form-elenco-utenti'>	
	<a href="edit-acc-stud.php">Studenti</a><br>
	<a href="edit-acc-doc.php">Docenti</a><br>
	<a href="edit-acc-adm.php">Amministratori</a>
	</div>
</section>

<?php
	include '../includes/footer_registro_adm.php';
?>
     
</body>
</html> 