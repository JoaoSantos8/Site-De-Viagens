<?php
include_once ("../php/backOffice.php");
global $con;


$nome=addslashes($_POST['nome']);
$viagem=addslashes($_POST['viagem']);
$hotel=addslashes($_POST['hotel']);

$sql = "SELECT * from viagens WHERE viagemPreco=$viagem";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);

$viagem=$dados['viagemId'];


$sqli = "SELECT * from hoteis WHERE hotelPreco=$hotel";
$resultado = mysqli_query($con, $sqli);
$dadosH = mysqli_fetch_array($resultado);

$hotel=$dadosH['hotelId'];


$sql="Insert into pacotes values(0,'$nome','$hotel','$viagem')";

//echo $sql;
//echo var_dump($_FILES['image']['name']);
mysqli_query($con,$sql);
header("location:listaPacotes.php");   