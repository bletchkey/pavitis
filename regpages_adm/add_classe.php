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
		<form action='".addClasse($conn)."' method='POST'>	
			
			<select name='classe' class='combo-box' required>			
			  <option>1</option>			  	  
			  <option>2</option>			  	  
			  <option>3</option>			  	  
			  <option>4</option>			  	  
			  <option>5</option>			  	  
			</select>	
			

			
			<select name='sezione' class='combo-box' required>			
			  <option>A</option>
			  <option>B</option>
			  <option>C</option>
			  <option>D</option>
			  <option>E</option>
			  <option>F</option>
			  <option>G</option>
			  <option>H</option>
			  <option>I</option>
			  <option>J</option>
			  <option>K</option>
			  <option>L</option>
			  <option>M</option>
			  <option>N</option>
			  <option>O</option>
			  <option>P</option>
			  <option>Q</option>
			  <option>R</option>
			  <option>S</option>
			  <option>T</option>
			  <option>U</option>
			  <option>V</option>
			  <option>W</option>
			  <option>X</option>
			  <option>Y</option>
			  <option>Z</option>			 			  
			</select>


			<select name='indirizzo' class='combo-box' required>			
			  <option>INFORMATICO</option>			  	  
			  <option>AGRARIO</option>			  	  
			  <option>LINGUISTICO</option>			  	  
			  <option>ECONOMICO</option>		  	  				  	  
			</select>
			
				
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
		
			<button class='main-button' type='submit' name='addclasse_Submit'>AGGIUNGI</button>
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