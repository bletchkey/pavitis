<?php
	ob_start();
	include '../includes/header_registro_doc.php';
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
		
		if(strpos($url,'ins_voto=ok') !== false){
			
			echo"
			<div id='dialog' title='Avviso'>
			  <p>Il voto e' stato inserito correttamente.</p>
			</div>
				
			";	
				
		}elseif(strpos($url,'edit_voto=ok') !== false){
			
			echo"
			<div id='dialog' title='Avviso'>
			  <p>Il voto e' stato modificato correttamente.</p>
			</div>
				
			";	
			
		}elseif(strpos($url,'del_voto=ok') !== false){
			
			echo"
			<div id='dialog' title='Avviso'>
			  <p>Il voto e' stato eliminato correttamente.</p>
			</div>
				
			";	
			
		}elseif(strpos($url,'upload=no_file') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Non hai scelto nessun documento.</p>
		</div>
			
		";	
			
	}elseif(strpos($url,'upload=big_file') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Il documento deve avere una dimensione massima di 16MB.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'upload=exist_file') !== false){
		
		echo"
		<div id='dialog' title='Errore'>
		  <p>Questo documento e' gia' presente.</p>
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
		  <p>Errore durante il caricamento del documento.</p>
		</div>
			
		";	
		
	}elseif(strpos($url,'ins_nota=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>La nota disciplinare e' stata inserita correttamente.</p>
		</div>			
		";		
	}elseif(strpos($url,'del_nota=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>La nota disciplinare e' stata eliminata correttamente.</p>
		</div>			
		";		
	}elseif(strpos($url,'edit_nota=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>La nota disciplinare e' stata modificata correttamente.</p>
		</div>			
		";		
	}elseif(strpos($url,'ins_compito=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>Il compito e' stato assegnato correttamente.</p>
		</div>			
		";		
	}elseif(strpos($url,'edit_compito=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>Il compito e' stato modificato correttamente.</p>
		</div>			
		";		
	}elseif(strpos($url,'del_compito=ok') !== false){
		
		echo"
		<div id='dialog' title='Avviso'>
		  <p>Il compito e' stato eliminato correttamente.</p>
		</div>			
		";		
	}
	?>


</section>

<?php
	include '../includes/footer_registro_doc.php';
?>
     
</body>
</html> 