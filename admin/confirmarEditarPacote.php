<?php
include_once ("../php/backOffice.php");
global $con;


$id=intval($_POST['num']);
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


        //echo "<script>alert('Entreiii aqui again $urlImagem')</script>";
        //$i++;
        $sql="Update pacotes set pacoteNome='$nome', pacoteViagemId='$viagem', pacoteHotelId='$hotel' where pacoteId='$id'";
        echo $sql;
        mysqli_query($con,$sql);
        header("location:listaPacotes.php");


?>