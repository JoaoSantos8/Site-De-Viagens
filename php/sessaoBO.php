<?php
include_once ("config.inc.php");
$con=mysqli_connect(HOST,USER,PWD,DATABASE);
$con->set_charset('UTF-8');


function sessao(){  
  session_start();
}

function sessaoUti(){
  $_SESSION['utilizadorNome'];
  $_SESSION['utilizadorCargo'];
  $_SESSION['utilizadorEmail'];
  $_SESSION['utilizadorIdade'];
  $_SESSION['utilizadorTelefone'];
  $_SESSION['utilizadorImagemURL'];
  $_SESSION['utilizadorId'];
}
  
function fim(){
  
  session_destroy();
}

?>