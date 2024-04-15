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



<div class="pad-box-voti"></div>



<?php







	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url







	/*if(strpos($url,'error=psw') !== false){



	 	echo "<div class='cont-err'><label class='error-txt'>Le password devono corrispondere.</label></div>";



	}



	elseif(strpos($url,'error=shpsw') !== false){



	 	echo "<div class='cont-err'><label class='error-txt'>La password deve essere lunga almeno 5 caratteri.</label></div>";



	}



	elseif(strpos($url,'error=mispsw') !== false){



	 echo "<div class='cont-err'><label class='error-txt'>La vecchia password non e' corretta.</label></div>";



	}*/







	if(strpos($url,'error=psw') !== false){



	echo"



	<div id='dialog' title='Error'>



	  <p>Le password devono corrispondere.</p>



	</div>







	";



	}



	elseif(strpos($url,'error=shpsw') !== false){



	echo"



	<div id='dialog' title='Error'>



	  <p>La password deve essere lunga almeno 8 caratteri.</p>



	</div>







	";



	}



	elseif(strpos($url,'error=mispsw') !== false){



	 echo"



	 <div id='dialog' title='Error'>



	  <p>La vecchia password non e' corretta.</p>



	</div>







	";



	}







	echo "



	<center>



	<div class='form-box-psw'>



	<form method='POST' action='".getNewPassword($conn)."'>



		<input type='hidden' name='id' value='".$id."'>



		<input type='password' name='password_old' placeholder='Vecchia password' required>



		<input type='password' name='password_new' placeholder='Nuova password' required>



		<input type='password' name='password_new_conf' placeholder='Conferma nuova password' required>



		<button class='main-button' type='submit' name='NewPswSubmit'>Conferma</button>



	</form>



	</div>



	</center>



	";











	function getNewPassword($conn){



		if(isset($_POST['NewPswSubmit'])){







		$old_psw = md5($_POST['password_old']);



		$check_psw = $_POST['password_new_conf'];



		$new_psw = md5($_POST['password_new']);



		$conf_new_psw = md5($_POST['password_new_conf']);



		$id = $_SESSION['id_doc'];







		$result1 = mysqli_query($dbconn, "SELECT password FROM accountDoc WHERE id = '$id' ");







		$row = mysqli_fetch_assoc($result1);



		$psw = $row['password'];











			if(strcmp($psw,$old_psw)== 0){



				if($new_psw != $conf_new_psw){



					header('Location: change_psw_doc.php?error=psw');



					exit();



				}else if (strlen($check_psw)<8){



					header('Location: change_psw_doc.php?error=shpsw');



					exit();



				}else



				{







				$result2 = mysqli_query($dbconn, "UPDATE accountDoc SET password = '$conf_new_psw' WHERE id = '$id'");







				session_start();



				session_destroy();







				header("Location: ../index.php");



				}



			}else{



				header('Location: change_psw_doc.php?error=mispsw');



				exit();



			}



		}



	}







?>







</section>







<?php



	include '../includes/footer_registro_doc.php';



?>







</body>



</html>