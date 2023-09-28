<?php
include_once ("../php/backOffice.php");
global $con;


$id=intval($_POST['num']);
$telefone=addslashes($_POST['telefone']);
$data=addslashes($_POST['dataC']);
$horaC=addslashes($_POST['horaC']);
$horaA=addslashes($_POST['horaA']);
$preco=addslashes($_POST['preco']);
$classe=addslashes($_POST['classe']);
$destino=addslashes($_POST['destino']);
$origem=addslashes($_POST['origem']);
$companhia=addslashes($_POST['companhia']);
$tipo=addslashes($_POST['tipo']);


$sql="select * from destinos where destinoNome='$destino'";
$result=mysqli_query($con,$sql);
$dados= mysqli_fetch_array($result);
$destino=$dados['destinoId'];

$sqli="select * from companhias where companhiaNome='$companhia'";
$resulta=mysqli_query($con,$sqli);
$dadosC= mysqli_fetch_array($resulta);
$companhia=$dadosC['companhiaId'];

$sql="select * from destinos where destinoNome='$origem'";
$resultd=mysqli_query($con,$sql);
$dadosO= mysqli_fetch_array($resultd);
$origem=$dadosO['destinoId'];



        $sql="Update viagens set viagemTelefone='$telefone', viagemData='$data', viagemIni='$horaC', viagemChegada='$horaA', viagemPreco='$preco', viagemTipo='$tipo', viagemClasse='$classe',viagemChegadaDestinoId='$origem', viagemDestinoId='$destino', viagemCompanhiaId='$companhia' where viagemId='$id'";
        //echo $sql;
        mysqli_query($con,$sql);
        header("location:listaViagens.php");


?>