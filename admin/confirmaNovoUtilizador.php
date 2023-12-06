<?php
include_once ("../php/frontOffice.php");
global $con;


$nome=addslashes($_POST['nome']);
$email=addslashes($_POST['email']);
$idade=addslashes($_POST['idade']);
$telefone=addslashes($_POST['telefone']);
$pass=addslashes($_POST['pass']);
$passC=addslashes($_POST['passConfirm']);
$escalao="geral";


$urlImagem = 'images/Utilizadores/default.jpg';


$sql = "SELECT * FROM utilizadores WHERE utilizadorEmail = '$email' AND utilizadorPass = '$pass'";
        $sql_query = $con->query($sql);
        $result = $sql_query->num_rows;

if($result==1){
    
    header("Location: ../signUp.php?erro=email_repetido");
}else{
    $sql="Insert into utilizadores values(0,'$nome','$email','$urlImagem','$idade','$telefone','$escalao','$pass','$passC')";
    //echo $sql;
    //echo var_dump($_FILES['image']['name']);
    mysqli_query($con,$sql);
    header("Location: ../login.php");
}

