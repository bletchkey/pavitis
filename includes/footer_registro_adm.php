<div class="pad-box-bottom"></div>


<footer>	
	<?php
	if(isset($_SESSION['id_adm'])){	
				
				$id_a = $_SESSION['id_adm'];
				echo "<div class='cont-all-name'>Nominativo:&nbsp<div class='container-name'><label class='name'>".$nome."</label>&nbsp";
				echo "<label class='name'>".$cognome."</label></div></div>&nbsp&nbsp&nbsp&nbsp&nbsp";	
					
				$sql_user ="SELECT * FROM accountAdm WHERE id='".$id_a."'";
				$result_user = $conn->query($sql_user);
				$row_user = $result_user->fetch_assoc();
				
				$username_adm = $row_user['username'];
				
				echo "<div class='cont-all-name'>utente:&nbsp<div class='container-name'><label class='name'>".$username_adm."</label>";
				
			}
	?>
</footer>