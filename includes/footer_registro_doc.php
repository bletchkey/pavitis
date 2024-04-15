<div class="pad-box-bottom"></div>


<footer>
	<?php
	if(isset($_SESSION['id_doc'])){		

				$id_d = $_SESSION['id_doc'];
				echo "<div class='cont-all-name'>Nominativo:&nbsp<div class='container-name'><label class='name'>".$nome."</label>&nbsp";
				echo "<label class='name'>".$cognome."</label></div></div>&nbsp&nbsp&nbsp&nbsp&nbsp";

				$sql_user ="SELECT * FROM accountDoc WHERE id='".$id_d."'";
				$result_user = $conn->query($sql_user);
				$row_user = $result_user->fetch_assoc();
				
				$username_doc = $row_user['username'];
				
				echo "<div class='cont-all-name'>utente:&nbsp<div class='container-name'><label class='name'>".$username_doc."</label>";
			}
	?>
</footer>