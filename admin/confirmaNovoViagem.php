<?php
include_once ("../php/backOffice.php");
global $con;


$data=addslashes($_POST['dataC']);
$horaC=addslashes($_POST['horaC']);
$horaA=addslashes($_POST['horaA']);
$telefone=addslashes($_POST['telefone']);
$lugares=addslashes($_POST['lugares']);
$preco=addslashes($_POST['preco']);
$classe=addslashes($_POST['classe']);
$tipo=addslashes($_POST['tipo']);
$destino=addslashes($_POST['destino']);
$origem=addslashes($_POST['origem']);
$companhia=addslashes($_POST['companhia']);


$sql="select * from destinos where destinoNome='$destino'";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);


$destino=$dados["destinoId"];

$sql="select * from destinos where destinoNome='$origem'";
$resultd=mysqli_query($con,$sql);
$dadosO=mysqli_fetch_array($resultd);


$origem=$dados["destinoId"];

$sql="select * from companhias where companhiaNome='$companhia'";
$resulta=mysqli_query($con,$sql);
$dadosC=mysqli_fetch_array($resulta);


$companhia=$dadosC["companhiaId"];

//echo $descricao;
$sql="Insert into viagens values(0,'$data','$horaC','$horaA','$telefone','$lugares','$preco','$tipo','$classe','$origem','$destino','$companhia')";
//echo $sql;
//echo var_dump($_FILES['image']['name']);
mysqli_query($con,$sql);
header("location:listaViagens.php");