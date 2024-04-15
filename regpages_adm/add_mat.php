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
	<h1 class="title_doc">Aggiungi materia</h1>
	<?php	
	echo"
		<div class='form-box-doc-classes'>			
		<form action='".addMat($conn)."' method='POST'>	
			<input type='text' name='materia' placeholder='Inserisci nome materia' required>
		
			<button class='main-button' type='submit' name='addmat_Submit'>AGGIUNGI</button>
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