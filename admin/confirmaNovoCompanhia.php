<?php
include_once ("../php/backOffice.php");
global $con;


$nome=addslashes($_POST['nome']);
$telefone=addslashes($_POST['telefone']);



$sql="Insert into companhias values(0,'$nome','$telefone')";

//echo var_dump($_FILES['image']['name']);
mysqli_query($con,$sql);
header("location:listaCompanhias.php"); 