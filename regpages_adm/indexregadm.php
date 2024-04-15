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
		
		if(strpos($url,'ins_person=ok') !== false){
			
			echo"
			<div id='dialog' title='Avviso'>
			  <p>Il nuovo utente e' stato inserito correttamente</p>
			</div>
				
			";	
				
		}elseif(strpos($url,'doc_classes=ok') !== false){
			
			echo"
			<div id='dialog' title='Avviso'>
			  <p>Le aggiunte sono state apportate correttamente.</p>
			</div>
				
			";	
			
		}elseif(strpos($url,'doc_classes=no') !== false){
			
			echo"
			<div id='dialog' title='Avviso'>
			  <p>Dati gia' presenti.</p>
			</div>
				
			";	
			
		}elseif(strpos($url,'upload=no_file') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Non hai scelto nessuna foto.</p>
		</div>
			
		";	
			
	}elseif(strpos($url,'upload=big_file') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Il documento deve avere una dimensione massima di 2MB.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'upload=exist_file') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Questa foto e' gia' presente.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'upload=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>Caricamento avvenuto con successo.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'upload=no') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Errore durante il caricamento della foto.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'upload=no_type') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Foto di estensione non accettabile.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'ins_mat=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>Inserimento della materia avvenuto con successo.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'ins_mat=no') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Materia gia' presente.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'ins_classe=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>Classe inserita correttamente.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'ins_classe=no') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>La classe e' gia' presente.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'stud_classes=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>Studente inserito nella classe correttamente.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'stud_classes=no') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Studente gia' presente in una classe per questa annata.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'edit_person=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>Account modificato con successo.</p>
		</div>
			
		";	
		
	}
	?>


</section>
<?php
	include '../includes/footer_registro_adm.php';
?>
     
</body>
</html> 