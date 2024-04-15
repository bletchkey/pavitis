<?php
	ob_start();
	include '../includes/header_registro_doc.php';
	session_start();

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
 <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
<section>
	<?php
	$dbconn = mysqli_connect('localhost', 'root','');
	mysqli_select_db($dbconn, 'my_pavitis');

	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url

	$ses_var_doc = $_SESSION["id_doc"];

	$n=0;

	$idclass =  substr($url, strrpos($url, '=') + 1);
    $_SESSION['id_classe_mat_voti'] = $idclass;

	$result = mysqli_query($dbconn, "SELECT studentevoto.id,studentevoto.data,studentevoto.voto_n,studentevoto.voto_scritto,studentevoto.message,studentevoto.studente,studentevoto.docente FROM studentevoto INNER JOIN (accountStud INNER JOIN studenteclasse  ON (accountStud.id=studenteclasse.studente)) ON(accountStud.id = studentevoto.studente) WHERE studenteclasse.classe = '$idclass' AND  studentevoto.docente= '$ses_var_doc' ORDER BY studentevoto.data DESC");

	if(mysqli_fetch_assoc($result)){
	?>
	<h1 class="title_doc">Elenco voti</h1>
	<div id="order_table">
	<table class="table-ins-voti">
	<tr class="tr-ins-voti">
	<th class="th-ins-voti">#</th>
	<th class="th-ins-voti">Cognome</th>
	<th class="th-ins-voti">Nome</th>
	<th class="th-ins-voti">Data</th>
	<th class="th-ins-voti">Materia</th>
	<th colspan="2" class="th-ins-voti">Voto</th>
	</tr>

	<?php
			$result_1 = mysqli_query($dbconn, "SELECT studentevoto.id,studentevoto.data,studentevoto.materia,studentevoto.voto_n,studentevoto.voto_scritto,studentevoto.message,studentevoto.studente,studentevoto.docente FROM studentevoto INNER JOIN (accountStud INNER JOIN studenteclasse  ON (accountStud.id=studenteclasse.studente)) ON(accountStud.id = studentevoto.studente) WHERE studenteclasse.classe = '$idclass' AND  studentevoto.docente= '$ses_var_doc' ORDER BY studentevoto.data DESC");
			while($row = mysqli_fetch_assoc($result_1)){

			$studente= $row['studente'];

			$get_materie = mysqli_query($dbconn, "SELECT materia.materia,materia.id FROM materia");
			$get_studenti= mysqli_query($dbconn, "SELECT * FROM dataStud WHERE id_accountStud = '$studente' ");

			$row2 = mysqli_fetch_assoc($get_studenti);


			$nome_s = $row2['nome'];
			$cognome_s = $row2['cognome'];

			$materia= $row['materia'];

			while($row_3 = mysqli_fetch_assoc($get_materie)){
					if($materia == $row_3['id'])
						$materia= $row_3['materia'];
					}//end while

			$id= $row['id'];

			$data = $row['data'];
			$voto = $row['voto_n'];

			list($m,$d,$y) = explode('-',$data);

			$data_c = $y."/".$d."/".$m;

			$n++;

			echo "
			  <tr>
				<td class='td-ins-num'>".$n."</td>
				<td class='td-ins-voti'>".$cognome_s."</td>
				<td class='td-ins-voti'>".$nome_s."</td>
				<td class='td-ins-data'>".$data_c."</td>
				<td class='td-ins-materia' style='padding: 5px 0px 5px 10px;'>".$materia."</td>

				<td class='td-ins-voto'>".$voto."</td>
				<td class='td-ins-edit'><a href='visual_voti_3.php?voti_id=".$id."'><img class='edit-pencil' src='../img/registro_img/edit_pencil.png'></a></td>
			  </tr>
			";

	}//end while


?>
</table>
</div>
<div class='form-data'>
<?php
//echo"<form action='".dateFilter($conn)."' method='POST'>";
?>
<!--p>Filtra per data:<br><br> Data inizio:<input class="data-pick" type="text" name="from_date" id="from_date"><br><br> Data fine:<input class="data-pick" name="to_date" type="text" id="to_date"><br><br> <button class="data_gen_btn" id="dateFiltSub">Conferma</button></p-->
<!--/form-->
</div>
<script>
      $(document).ready(function(){
           $.datepicker.setDefaults({
                dateFormat: 'dd/mm/yy'
           });
           $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
           });
           $('#dateFiltSub').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"filter.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date},
                          success:function(data)
                          {
                               $('#order_table').html(data);
                          }
                     });
                }
                else
                {
                     alert("Seleziona le datea");
                }
           });
      });
 </script>
<?php
}else
	{
		echo"
			<div id='dialog' title='Avviso'>
			  <p>Nessun studente di questa classe ha ricevuto un voto da lei.</p>
			</div>

			";
	}

?>
<div class="space-bottom-marks"></div>
</section>

<?php
	include '../includes/footer_registro_doc.php';
?>
</body>
</html>
