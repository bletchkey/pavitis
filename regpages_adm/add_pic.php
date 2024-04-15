<?php
	ob_start();
	include '../includes/header_registro_adm.php';
?>

<section>
	<h1 class="title_doc">Scegli il tipo di account</h1>
	<div class='form-elenco-utenti'>	
	<a href="ins-pic-stud.php">Studenti</a><br>
	<a href="ins-pic-doc.php">Docenti</a><br>
	<a href="ins-pic-adm.php">Amministratori</a>
	</div>
</section>

<?php
	include '../includes/footer_registro_adm.php';
?>
     
</body>
</html> 