//get modal ids

var form_stud = document.getElementById("LoginModalStud");

var form_doc = document.getElementById("LoginModalDoc");

var form_adm = document.getElementById("LoginModalAdm");

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

// Get the modal

var modalstud = document.getElementById("LoginModalStud");

var modaldoc = document.getElementById("LoginModalDoc");

var modaladm = document.getElementById("LoginModalAdm");

// Get the button that opens the modal

var linkloginstud = document.getElementById("logmodalstud");

var linklogindoc = document.getElementById("logmodaldoc");

var linkloginadm = document.getElementById("logmodaladm");

// Get the <span> element that closes the modal

var span1 = document.getElementsByClassName("close")[0];

var span2 = document.getElementsByClassName("close2")[0];

var span3 = document.getElementsByClassName("close3")[0];

//controllo username stud

function checkTextField_stud() {
  if (text_stud.value == "") {
    text_stud.style.border = "1px solid #ff0000";

    text_err_stud.innerHTML = "Inserisci un nome utente valido.";
  } else if (text_stud.value != "") {
    text_stud.style.border = "1px solid #ccc";
  }
}

//controllo password stud

function checkPswField_stud() {
  if (psw_stud.value == "") {
    psw_stud.style.border = "1px solid #ff0000";

    psw_err_stud.innerHTML = "Inserisci una password.";
  } else if (psw_stud.value != "") {
    psw_stud.style.border = "1px solid #ccc";
  }
}

//pulisci text-err stud

function cleanText_stud() {
  text_stud.style.border = "1px solid #ccc";

  text_err_stud.innerHTML = "";
}

//pulisci psw-err stud

function cleanPsw_stud() {
  psw_stud.style.border = "1px solid #ccc";

  psw_err_stud.innerHTML = "";
}

//controllo username doc

function checkTextField_doc() {
  if (text_doc.value == "") {
    text_doc.style.border = "1px solid #ff0000";

    text_err_doc.innerHTML = "Inserisci un nome utente valido.";
  } else if (text_doc.value != "") {
    text_doc.style.border = "1px solid #ccc";
  }
}

//controllo password doc

function checkPswField_doc() {
  if (psw_doc.value == "") {
    psw_doc.style.border = "1px solid #ff0000";

    psw_err_doc.innerHTML = "Inserisci una password.";
  } else if (psw_doc.value != "") {
    psw_doc.style.border = "1px solid #ccc";
  }
}

//pulisci text-err doc

function cleanText_doc() {
  text_doc.style.border = "1px solid #ccc";

  text_err_doc.innerHTML = "";
}

//pulisci psw-err doc

function cleanPsw_doc() {
  psw_doc.style.border = "1px solid #ccc";

  psw_err_doc.innerHTML = "";
}

//controllo username adm

function checkTextField_adm() {
  if (text_adm.value == "") {
    text_adm.style.border = "1px solid #ff0000";

    text_err_adm.innerHTML = "Inserisci un nome utente valido.";
  } else if (text_adm.value != "") {
    text_adm.style.border = "1px solid #ccc";
  }
}

//controllo password adm

function checkPswField_adm() {
  if (psw_adm.value == "") {
    psw_adm.style.border = "1px solid #ff0000";

    psw_err_adm.innerHTML = "Inserisci una password.";
  } else if (psw_adm.value != "") {
    psw_adm.style.border = "1px solid #ccc";
  }
}

//pulisci text-err adm

function cleanText_adm() {
  text_adm.style.border = "1px solid #ccc";

  text_err_adm.innerHTML = "";
}

//pulisci psw-err adm

function cleanPsw_adm() {
  psw_adm.style.border = "1px solid #ccc";

  psw_err_adm.innerHTML = "";
}
