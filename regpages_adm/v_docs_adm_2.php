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

 <script>

  $( function() {

    $( "#accordion" ).accordion();

  } );

  </script>

<section>

      <?php



		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  //get the whole url



		$idclass =  substr($url, strrpos($url, '=') + 1);



		$result = mysqli_query($dbconn, "SELECT * FROM classe WHERE classe.id = '$idclass'");



		$row_class = mysqli_fetch_assoc($result);



		$class_classe = $row_class['classe'];

		$class_sezione = $row_class['sezione'];



		$class_name = $class_classe . $class_sezione;



        // Opens directory

		$dir = '../documenti/'.$class_name.'/';

        $myDirectory=opendir($dir);



        // Gets each entry

        while($entryName=readdir($myDirectory)) {

          $dirArray[]=$entryName;

        }



		if($dirArray!= null){



		?>



		 <h1 class="title_doc">Documenti</h1>



		<div class="documenti_stud">

		<table class="sortable">

		  <thead>

			<tr>

			  <th>Nome file</th>

			  <th>Tipo</th>

			  <th>Dimensioni</th>

			</tr>

		  </thead>

		  <tbody>



		<?php



        // Finds extensions of files

        function findexts ($filename) {

          $filename=strtolower($filename);

          $exts=split("[/\\.]", $filename);

          $n=count($exts)-1;

          $exts=$exts[$n];

          return $exts;

        }



        // Closes directory

        closedir($myDirectory);



        // Counts elements in array

        $indexCount=count($dirArray);



        // Sorts files

        sort($dirArray);



        // Loops through the array of files

        for($index=0; $index < $indexCount; $index++) {



          // Allows ./?hidden to show hidden files

          if($_SERVER['QUERY_STRING']=="hidden")

          {$hide="";

          $ahref="./";

          $atext="Hide";}

          else

          {$hide=".";

          $ahref="./?hidden";

          $atext="Show";}

          if(substr("$dirArray[$index]", 0, 1) != $hide) {



          // Gets File Names

          $name=$dirArray[$index];

          $namehref=$dirArray[$index];



          // Gets Extensions

          $extn=findexts($dirArray[$index]);



          // Gets file size

          $size=number_format(filesize($dirArray[$index]));



          // Gets Date Modified Data

          $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));

          $timekey=date("YmdHis", filemtime($dirArray[$index]));



          // Prettifies File Types, add more to suit your needs.

          switch ($extn){

            case "png": $extn="PNG Image"; break;

            case "jpg": $extn="JPEG Image"; break;

            case "svg": $extn="SVG Image"; break;

            case "gif": $extn="GIF Image"; break;

            case "ico": $extn="Windows Icon"; break;



            case "txt": $extn="Text File"; break;

            case "log": $extn="Log File"; break;

            case "htm": $extn="HTML File"; break;

            case "php": $extn="PHP Script"; break;

            case "js": $extn="Javascript"; break;

            case "css": $extn="Stylesheet"; break;

            case "pdf": $extn="PDF Document"; break;



            case "zip": $extn="ZIP Archive"; break;

            case "bak": $extn="Backup File"; break;



            default: $extn=strtoupper($extn)." File"; break;

          }



          // Separates directories

          if(is_dir($dirArray[$index])) {

            $extn="&lt;Directory&gt;";

            $size="&lt;Directory&gt;";

            $class="dir";

          } else {

            $class="file";

          }



          // Cleans up . and .. directories

          if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}

          if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}



          // Print 'em

          print("

          <tr class='$class'>

            <td><a target='blank' href='../documenti/$class_name/$namehref'>$name</a></td>

            <td><a target='blank' href='../documenti/$class_name/$namehref'>$extn</a></td>

            <td><a target='blank' href='../documenti/$class_name/$namehref'>$size B</a></td>

          </tr>");

          }

        }

		}else{

			echo"

			<div id='dialog' title='Avviso'>

			  <p>Non sono stati condivisi documenti in questa classe.</p>

			</div>



			";

		}

      ?>

      </tbody>

    </table>



  </div>

  <div class="space-bottom-marks"></div>

</section>



<?php

	include '../includes/footer_registro_adm.php';

?>



</body>

</html>