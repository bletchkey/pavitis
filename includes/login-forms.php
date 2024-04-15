
<!-------------------------------------MODAL LOGINS ---------------------------------------->


<!--Login form-->
<div id="LoginModalStud" class="modal">

<!-- Modal content -->
<div class="modal-content">
<div class="modal-header">
<span class="close">&times;</span>

<h2>SEZIONE: &nbspGENITORI - STUDENTI</h2><br>
<h2>ACCEDI ALL'&nbsp AREA PRIVATA</h2>
</div>
<div class="modal-body">
<div class="form-box"> 
<div class="box_login">		
<form method="POST" id="modulo_login_stud">
<p id="err_stud" class="err-msg-center"></p>
<br>
<input type="text" placeholder="Username" id="text_stud" name="username_stud" onblur="checkTextField_stud()" onclick="cleanText_stud()" onfocus="cleanText_stud()">	
<p id="text_err_stud" class="err-msg"></p>
<br>
<input type="password" placeholder="Password" id="psw_stud" name="password_stud" onblur="checkPswField_stud()" onclick="cleanPsw_stud()" onfocus="cleanPsw_stud()">
<p id="psw_err_stud" class="err-msg"></p>
<br>
<button name="logSubmitStud" type="submit" id="btn_stud">ACCEDI</button>
</form>		
<br>
<span><a id="psw_forgot_stud">Hai dimenticato la password?</a></span>	
</div>
</div>
</div>
</div>
</div>   


<!-- login doc-->
<div id="LoginModalDoc" class="modal">
<!-- Modal content -->
<div class="modal-content">
<div class="modal-header">
<span class="close2">&times;</span>

<h2>SEZIONE: &nbspDOCENTI</h2><br>
<h2>ACCEDI ALL'&nbsp AREA PRIVATA</h2>
</div>
<div class="modal-body">
<div class="form-box"> 
<div class="box_login">		
<form method="POST" id="modulo_login_doc">	
<p id="err_doc" class="err-msg-center"></p>
<br>
<input type="text" placeholder="Username" name="username_doc" id="text_doc" onblur="checkTextField_doc()" onclick="cleanText_doc()" onfocus="cleanText_doc()">	
<p id="text_err_doc" class="err-msg"></p>
<br>
<input type="password" placeholder="Password" name="password_doc" id="psw_doc" onblur="checkPswField_doc()" onclick="cleanPsw_doc()" onfocus="cleanPsw_doc()">
<p id="psw_err_doc" class="err-msg"></p>
<br>
<button name="logSubmitDoc" type="submit" id="btn_doc">ACCEDI</button>
</form>		
<br>
<span><a id="psw_forgot_doc">Hai dimenticato la password?</a></span>	
</div>
</div>
</div>
</div>
</div>    



<!-- login administrator-->
<div id="LoginModalAdm" class="modal">
<!-- Modal content -->
<div class="modal-content">
<div class="modal-header">
<span class="close3">&times;</span>

<h2>SEZIONE: &nbspAMMINISTRATORI</h2><br>
<h2>ACCEDI ALL'&nbsp AREA PRIVATA</h2>
</div>
<div class="modal-body">
<div class="form-box"> 
<div class="box_login">     
<form method="POST" id="modulo_login_adm">   
<p id="err_adm" class="err-msg-center"></p>
<br>
<input type="text" placeholder="Username" name="username_adm" id="text_adm" onblur="checkTextField_adm()" onclick="cleanText_adm()" onfocus="cleanText_adm()"> 
<p id="text_err_adm" class="err-msg"></p> 
<br>
<input type="password" placeholder="Password" name="password_adm" id="psw_adm" onblur="checkPswField_adm()" onclick="cleanPsw_adm()" onfocus="cleanPsw_adm()">
<p id="psw_err_adm" class="err-msg"></p>
<br>
<button name="logSubmitAdm" type="submit" id="btn_adm">ACCEDI</button>
</form>     
<br>
<span><a id="psw_forgot_adm">Hai dimenticato la password?</a></span>	
</div>
</div>
</div>
</div>
</div>   
<!-------------------------------------END OF MODAL LOGINS ---------------------------------------->






<!-------------------------------------MODAL RECUPERA PASSOWORD---------------------------------------->

<!-- psw recovery stud-->
<div id="PswRecStud" class="modal">
<!-- Modal content -->
<div class="modal-content">
<div class="modal-header">
<span class="close_stud_psw_rec">&times;</span>

<h2>SEZIONE: &nbsp STUDENTI</h2><br>
<h2>RECUPERA PASSWORD</h2>
</div>
<div class="modal-body">
<div class="form-box"> 
<div class="box_login">		
<form method="POST" id="modulo_recupera_stud">
<p id="err_recupera_stud" class="err-msg-center"></p>
<br>
<input type="text" placeholder="E-mail" id="text_recupera_stud" name="email_stud" onblur="checkTextField_stud()" onclick="cleanText_stud()" onfocus="cleanText_stud()">	
<p id="text_err_recupera_stud" class="err-msg"></p>
<br>
<button name="recSubmitStud" type="submit" id="btn_recupera_stud">INVIA RECUPERO PASSWORD</button>
</form>		
<br>
</div>
</div>
</div>
</div>
</div>  

<!-- psw recovery doc-->
<div id="PswRecDoc" class="modal">
<!-- Modal content -->
<div class="modal-content">
<div class="modal-header">
<span class="close_doc_psw_rec">&times;</span>

<h2>SEZIONE: &nbsp DOCENTI</h2><br>
<h2>RECUPERA PASSWORD</h2>
</div>
<div class="modal-body">
<div class="form-box"> 
<div class="box_login">		
<form method="POST" id="modulo_recupera_doc">
<p id="err_recupera_doc" class="err-msg-center"></p>
<br>
<input type="text" placeholder="E-mail" id="text_recupera_doc" name="email_doc" onblur="checkTextField_doc()" onclick="cleanText_doc()" onfocus="cleanText_doc()">	
<p id="text_err_recupera_doc" class="err-msg"></p>
<br>
<button name="recSubmitDoc" type="submit" id="btn_recupera_doc">INVIA RECUPERO PASSWORD</button>
</form>		
<br>
</div>
</div>
</div>
</div>
</div> 


<!-- psw recovery adm-->
<div id="PswRecAdm" class="modal">
<!-- Modal content -->
<div class="modal-content">
<div class="modal-header">
<span class="close_adm_psw_rec">&times;</span>

<h2>SEZIONE: &nbsp AMMINISTRATORI</h2><br>
<h2>RECUPERA PASSWORD</h2>
</div>
<div class="modal-body">
<div class="form-box"> 
<div class="box_login">		
<form method="POST" id="modulo_recupera_adm">
<p id="err_recupera_adm" class="err-msg-center"></p>
<br>
<input type="text" placeholder="E-mail" id="text_recupera_adm" name="email_adm" onblur="checkTextField_adm()" onclick="cleanText_adm()" onfocus="cleanText_adm()">	
<p id="text_err_recupera_adm" class="err-msg"></p>
<br>
<button name="recSubmitAdm" type="submit" id="btn_recupera_adm">INVIA RECUPERO PASSWORD</button>
</form>		
<br>
</div>
</div>
</div>
</div>
</div> 


<!-------------------------------------END OF MODAL RECUPERA PASSOWORD---------------------------------------->


<script type="text/javascript">
//STUDENTI
$("#modulo_login_stud").submit(function() {
  // passo i dati (via POST) al file PHP che effettua le verifiche 
  $.post("includes/logStud.php", { username_s: $('#text_stud').val(), password_s: $('#psw_stud').val(), rand: Math.random() }, function(risposta_stud) {
    // se i dati sono corretti...
    if (risposta_stud == 1) {
      // applico l'effetto allo span con id "messaggio"
      $("#btn_stud").fadeTo(200, 0.1, function() {
        // per prima cosa mostro, con effetto fade, un messaggio di attesa
        $(this).text('ELABORAZIONE IN CORSO...').fadeTo(900, 1, function() {
          // al termine effettuo il redirect alla pagina privata
          document.location = 'regpages_stud/indexregstud.php';
        });
      });
    // se, invece, i dati non sono corretti...
    }else if (risposta_stud == 0){
      // stampo un messaggio di errore
      $("#err_stud").fadeTo(200, 0.1, function() {
        $(this).removeClass().addClass('err-msg-center').text('Il nome utente e la password non sono stati immessi correttamente.').fadeTo(0,1);
      });
    }
  });
  // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
  return false;
});

//DOCENTI
$("#modulo_login_doc").submit(function() {
  // passo i dati (via POST) al file PHP che effettua le verifiche 
  $.post("includes/logDoc.php", { username_d: $('#text_doc').val(), password_d: $('#psw_doc').val(), rand: Math.random() }, function(risposta_doc) {
    // se i dati sono corretti...
    if (risposta_doc == 1) {
      // applico l'effetto allo span con id "messaggio"
      $("#btn_doc").fadeTo(200, 0.1, function() {
        // per prima cosa mostro, con effetto fade, un messaggio di attesa
        $(this).text('ELABORAZIONE IN CORSO...').fadeTo(900, 1, function() {
          // al termine effettuo il redirect alla pagina privata
          document.location = 'regpages_doc/indexregdoc.php';
        });
      });
    // se, invece, i dati non sono corretti...
    }else if (risposta_doc == 0){
      // stampo un messaggio di errore
      $("#err_doc").fadeTo(200, 0.1, function() {
        $(this).removeClass().addClass('err-msg-center').text('Il nome utente e la password non sono stati immessi correttamente.').fadeTo(0,1);
      });
    }
  });
  // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
  return false;
});

//AMMINISTRATORI
$("#modulo_login_adm").submit(function() {
  // passo i dati (via POST) al file PHP che effettua le verifiche 
  $.post("includes/logAdm.php", { username_a: $('#text_adm').val(), password_a: $('#psw_adm').val(), rand: Math.random() }, function(risposta_adm) {
    // se i dati sono corretti...
    if (risposta_adm == 1) {
      // applico l'effetto allo span con id "messaggio"
      $("#btn_adm").fadeTo(200, 0.1, function() {
        // per prima cosa mostro, con effetto fade, un messaggio di attesa
        $(this).text('ELABORAZIONE IN CORSO...').fadeTo(900, 1, function() {
          // al termine effettuo il redirect alla pagina privata
          document.location = 'regpages_adm/indexregadm.php';
        });
      });
    // se, invece, i dati non sono corretti...
    }else if (risposta_adm == 0){
      // stampo un messaggio di errore
      $("#err_adm").fadeTo(200, 0.1, function() {
        $(this).removeClass().addClass('err-msg-center').text('Il nome utente e la password non sono stati immessi correttamente.').fadeTo(0,1);
      });
    }
  });
  // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
  return false;
});
</script>

<script>
//get modal stud ids
var text_stud = document.getElementById("text_stud");	
var psw_stud = document.getElementById("psw_stud");
var text_err_stud = document.getElementById("text_err_stud");
var psw_err_stud = document.getElementById("psw_err_stud");
var main_err_stud = document.getElementById("err_stud");

//get modal doc ids
var text_doc = document.getElementById("text_doc");	
var psw_doc = document.getElementById("psw_doc");
var text_err_doc = document.getElementById("text_err_doc");
var psw_err_doc = document.getElementById("psw_err_doc");
var main_err_doc = document.getElementById("err_doc");

//get modal adm ids
var text_adm = document.getElementById("text_adm");	
var psw_adm = document.getElementById("psw_adm");
var text_err_adm = document.getElementById("text_err_adm");
var psw_err_adm = document.getElementById("psw_err_adm");
var main_err_adm = document.getElementById("err_adm");




//RECUPERA PASSWORD-----------------------

// Get the button that opens the modal password recovery
var psw_recov_stud = document.getElementById("psw_forgot_stud");
var psw_recov_doc = document.getElementById("psw_forgot_doc");
var psw_recov_adm = document.getElementById("psw_forgot_adm");

// Get the modal password recovery
var modal_pswrec_stud = document.getElementById('PswRecStud');
var modal_pswrec_doc = document.getElementById('PswRecDoc');
var modal_pswrec_adm = document.getElementById('PswRecAdm');

// Get the <span> element that closes the modal
var span_stud = document.getElementsByClassName("close_stud_psw_rec")[0];
var span_doc = document.getElementsByClassName("close_doc_psw_rec")[0];
var span_adm = document.getElementsByClassName("close_adm_psw_rec")[0];


//----------------------------------------



// Get the modal
var modalstud = document.getElementById('LoginModalStud');
var modaldoc = document.getElementById('LoginModalDoc');
var modaladm = document.getElementById('LoginModalAdm');

// Get the button that opens the modal
var linkloginstud = document.getElementById("logmodalstud");
var linklogindoc = document.getElementById("logmodaldoc");
var linkloginadm = document.getElementById("logmodaladm");

var linkloginstud_side = document.getElementById("logmodalstud_sidenav");
var linklogindoc_side = document.getElementById("logmodaldoc_sidenav");
var linkloginadm_side = document.getElementById("logmodaladm_sidenav");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];
var span3 = document.getElementsByClassName("close3")[0];

//CONTROLLI-----------------------------------------------------------------

//controllo username stud
function checkTextField_stud() {	
	if (text_stud.value == '') {   	
		text_stud.style.border = "1px solid #ff0000";	
		text_err_stud.innerHTML = "Inserisci un nome utente valido.";
	}else if (text_stud.value != ''){
		text_stud.style.border = "1px solid #ccc";		
	}	
}



//controllo password stud
function checkPswField_stud() {		
	if (psw_stud.value == '') {   	
		psw_stud.style.border = "1px solid #ff0000";	
		psw_err_stud.innerHTML = "Inserisci una password.";
	}else if (psw_stud.value != ''){
		psw_stud.style.border = "1px solid #ccc";		
	}	
}

//pulisci text-err stud
function cleanText_stud(){
	text_stud.style.border = "1px solid #ccc";	
	text_err_stud.innerHTML = "";	
	main_err_stud.innerHTML = ""; 
}

//pulisci psw-err stud
function cleanPsw_stud(){
	psw_stud.style.border = "1px solid #ccc";		
	psw_err_stud.innerHTML = "";
	main_err_stud.innerHTML = ""; 	
}

//controllo username doc
function checkTextField_doc() {	
	if (text_doc.value == '') {   	
		text_doc.style.border = "1px solid #ff0000";	
		text_err_doc.innerHTML = "Inserisci un nome utente valido.";
	}else if (text_doc.value != ''){
		text_doc.style.border = "1px solid #ccc";		
	}	
}



//controllo password doc
function checkPswField_doc() {		
	if (psw_doc.value == '') {   	
		psw_doc.style.border = "1px solid #ff0000";	
		psw_err_doc.innerHTML = "Inserisci una password.";
	}else if (psw_doc.value != ''){
		psw_doc.style.border = "1px solid #ccc";		
	}	
}

//pulisci text-err doc
function cleanText_doc(){
	text_doc.style.border = "1px solid #ccc";	
	text_err_doc.innerHTML = "";
	main_err_doc.innerHTML = ""; 	
}

//pulisci psw-err doc
function cleanPsw_doc(){
	psw_doc.style.border = "1px solid #ccc";	
	psw_err_doc.innerHTML = "";
	main_err_doc.innerHTML = "";	
}




//controllo username adm
function checkTextField_adm() {		
	if (text_adm.value == '') {   	
		text_adm.style.border = "1px solid #ff0000";	
		text_err_adm.innerHTML = "Inserisci un nome utente valido.";
	}else if (text_adm.value != ''){
		text_adm.style.border = "1px solid #ccc";		
	}		
}


//controllo password adm
function checkPswField_adm() {	
	if (psw_adm.value == '') {   	
		psw_adm.style.border = "1px solid #ff0000";	
		psw_err_adm.innerHTML = "Inserisci una password.";
	}else if (psw_adm.value != ''){
		psw_adm.style.border = "1px solid #ccc";		
	}		
}

//pulisci text-err adm
function cleanText_adm(){
	text_adm.style.border = "1px solid #ccc";	
	text_err_adm.innerHTML = "";	
	main_err_adm.innerHTML = ""; 
}

//pulisci psw-err adm
function cleanPsw_adm(){
	psw_adm.style.border = "1px solid #ccc";	
	psw_err_adm.innerHTML = "";
	main_err_adm.innerHTML = ""; 	
}


function cleanField(){
	psw_stud.value="";
	text_stud.value="";
	text_doc.value="";
	psw_doc.value="";	
	text_adm.value="";
	psw_adm.value="";
}


//---------------------------------------------------------------------------------------------


//-----------------------------OPEN RECUPERA PASSWORD  modal-----------------------------------

// When the user clicks the button, open the modal 
psw_recov_stud.onclick = function() {
    modalstud.style.display = "none";
	modaldoc.style.display = "none";
    modaladm.style.display = "none";
	modal_pswrec_stud.style.display = "block";
	modal_pswrec_doc.style.display = "none";
	modal_pswrec_adm.style.display = "none";
}

psw_recov_doc.onclick = function() {
    modaldoc.style.display = "none";
	modalstud.style.display = "none";
    modaladm.style.display = "none";
	modal_pswrec_stud.style.display = "none";
	modal_pswrec_doc.style.display = "block";
	modal_pswrec_adm.style.display = "none";
}

psw_recov_adm.onclick = function() {
    modaldoc.style.display = "none";
	modalstud.style.display = "none";
    modaladm.style.display = "none";
	modal_pswrec_stud.style.display = "none";
	modal_pswrec_doc.style.display = "none";
	modal_pswrec_adm.style.display = "block";
}


// When the user clicks on <span> (x), close the modal

span_stud.onclick = function() {
	modal_pswrec_stud.style.display = "none";  
}

span_doc.onclick = function() {  
	modal_pswrec_doc.style.display = "none";  	
}

span_adm.onclick = function() {  
	modal_pswrec_adm.style.display = "none";  	
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_pswrec_stud) {
        modal_pswrec_stud.style.display = "none";
    }
	
	if (event.target == modal_pswrec_doc) {
        modal_pswrec_doc.style.display = "none";
    }
	
	if (event.target == modal_pswrec_adm) {
        modal_pswrec_adm.style.display = "none";
    }
}


//---------------------OPEN LOGIN MODAL-----------------------------------------------------



// When the user clicks the button, open the modal 
linkloginstud.onclick = function() {
    modalstud.style.display = "block";
	modaldoc.style.display = "none";
    modaladm.style.display = "none";
	modal_pswrec_stud.style.display = "none";
	modal_pswrec_doc.style.display = "none";
}

linklogindoc.onclick = function() {
    modaldoc.style.display = "block";
	modalstud.style.display = "none";
    modaladm.style.display = "none";
	modal_pswrec_stud.style.display = "none";
	modal_pswrec_doc.style.display = "none";
}

linkloginadm.onclick = function() {
    modaladm.style.display = "block";
    modaldoc.style.display = "none";
    modalstud.style.display = "none";
	modal_pswrec_stud.style.display = "none";
	modal_pswrec_doc.style.display = "none";
}



//get sidenav bar login

linkloginstud_side.onclick = function() {
    modalstud.style.display = "block";
	modaldoc.style.display = "none";
    modaladm.style.display = "none";
	modal_pswrec_stud.style.display = "none";
	modal_pswrec_doc.style.display = "none";
}

linklogindoc_side.onclick = function() {
    modaldoc.style.display = "block";
	modalstud.style.display = "none";
    modaladm.style.display = "none";
	modal_pswrec_stud.style.display = "none";
	modal_pswrec_doc.style.display = "none";
}

linkloginadm_side.onclick = function() {
    modaladm.style.display = "block";
    modaldoc.style.display = "none";
    modalstud.style.display = "none";
	modal_pswrec_stud.style.display = "none";
	modal_pswrec_doc.style.display = "none";
}


//-----CLEAN AND CLOSE modals-----------------------------------------------------------------

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
	modalstud.style.display = "none";  
	cleanText_stud();
	cleanPsw_stud();
	cleanField();
}

span2.onclick = function() {  
	modaldoc.style.display = "none";  	
	cleanText_doc();
	cleanPsw_doc();
	cleanField();
}

span3.onclick = function() {  
    modaladm.style.display = "none"; 
	cleanText_adm();
	cleanPsw_adm();
	cleanField();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalstud) {
        modalstud.style.display = "none";
		cleanText_stud();
		cleanPsw_stud();
		cleanField();
    }
	
	if (event.target == modaldoc) {
        modaldoc.style.display = "none";
		cleanText_doc();
		cleanPsw_doc();
		cleanField();
    }

    if (event.target == modaladm) {
        modaladm.style.display = "none";
		cleanText_adm();
		cleanPsw_adm();
		cleanField();
    }
}

//-------------------------------------------------------------------------------------------

</script>













