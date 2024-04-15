<?php



//include '../includes/dbh.inc.php';



//Funzione per filtro con data



		if(isset($_POST["from_date"], $_POST["to_date"])){

		session_start();



		// mi connetto al MySQL

		//$dbconn = mysqli_connect('localhost', 'root','');

		//mysqli_select_db($dbconn, 'my_pavitis');



		$conn = mysqli_connect('localhost', 'root', '', 'my_pavitis');



		$data_i = $_POST['from_date'];

		$data_f = $_POST['to_date'];

		list($d_i,$m_i,$y_i) = explode('/',$data_i);

		list($d,$m,$y) = explode('/',$data_f);



		$data_i_c = $y_i."-".$m_i."-".$d_i;

		$data_f_c = $y."-".$m."-".$d;

		$ses_var_doc = $_SESSION["id_doc"];

		$idclass = $_SESSION['id_classe_mat_voti'];



		$output = "";


		$output .= '

			   <table class="table-ins-voti">

				<tr class="tr-ins-voti">

				<th class="th-ins-voti">n.</th>

				<th class="th-ins-voti">Alunno</th>

				<th class="th-ins-voti">Data</th>

				<th class="th-ins-voti">Materia</th>

				<th class="th-ins-voti">Voto</th>

				</tr>

		  ';

		$result = mysqli_query($dbconn, "SELECT studentevoto.id,studentevoto.data,studentevoto.voto_n,studentevoto.voto_scritto,studentevoto.message,studentevoto.studente,studentevoto.docente FROM studentevoto INNER JOIN (accountStud INNER JOIN studenteclasse  ON (accountStud.id=studenteclasse.studente)) ON(accountStud.id = studentevoto.studente) WHERE studenteclasse.classe = '$idclass' AND  studentevoto.docente= '$ses_var_doc' AND studentevoto.data>='$data_i_c' AND studentevoto.data<='$data_f_c' ORDER BY studentevoto.data DESC");

		if (mysqli_num_rows($result) > 0)

		 {

			 //$result_1 = mysqli_query($dbconn, "SELECT studentevoto.id,studentevoto.data,studentevoto.voto_n,studentevoto.voto_scritto,studentevoto.message,studentevoto.studente,studentevoto.docente FROM studentevoto INNER JOIN (accountStud INNER JOIN studenteclasse  ON (accountStud.id=studenteclasse.studente)) ON(accountStud.id = studentevoto.studente) WHERE studenteclasse.classe = '$idclass' AND  studentevoto.docente= '$ses_var_doc' ORDER BY studentevoto.data DESC");

			 /*  $result1 = mysqli_query($dbconn, "SELECT studentevoto.id,studentevoto.data,studentevoto.voto_n,studentevoto.voto_scritto,studentevoto.message,studentevoto.studente,studentevoto.docente FROM studentevoto INNER JOIN (accountStud INNER JOIN studenteclasse  ON (accountStud.id=studenteclasse.studente)) ON(accountStud.id = studentevoto.studente) WHERE studenteclasse.classe = '$idclass' AND  studentevoto.docente= '$ses_var_doc' AND studentevoto.data>='$data_i_c' AND studentevoto.data<='$data_f_c' ORDER BY studentevoto.data DESC");

			   while($row = mysqli_fetch_assoc($result_1)) {



						$studente= $row['studente'];



						$get_materie = mysqli_query($dbconn, "SELECT materia.materia FROM materia INNER JOIN materiadocente ON (materia.id=materiadocente.materia) WHERE materiadocente.docente = '$ses_var_doc' ORDER BY materia.materia ASC");

						$get_studenti= mysqli_query($dbconn, "SELECT * FROM dataStud WHERE id_accountStud = '$studente' ");





						$row2 = mysqli_fetch_assoc($get_studenti);

						$row3 = mysqli_fetch_assoc($get_materie);







						$nome_s = $row2['nome'];

						$cognome_s = $row2['cognome'];



						$materia = $row3['materia'];



						$id= $row['id'];



						$data = $row['data'];

						$voto = $row['voto_n'];



						list($m,$d,$y) = explode('-',$data);



						$data_c = $y."/".$d."/".$m;



						$n++;







					$output .= "

					<tr>

						<td class='td-ins-num'>".$n."</td>

						<td class='td-ins-voti'>".$cognome_s." ".$nome_s."</td>

						<td class='td-ins-data'>".$data_c."</td>

						<td class='td-ins-materia' style='padding: 5px 0px 5px 10px;'>".$materia."</td>



						<td class='td-ins-data'><a href='visual_voti_3.php?voto_id=".$id."'>".$voto."</a></td>

					  </tr>

					";

			   }  */



			   $output .= '

					<tr>

						 <td colspan="5">asdsad</td>

					</tr>

			   ';



		  }



		  else

		  {

			   $output .= '

					<tr>

						 <td colspan="5">Non ci sono voti in questa data</td>

					</tr>

			   ';

		  }

		  $output .= '</table>';

		  echo $output;

	 }



?>