<?php
include_once ("../php/backOffice.php");
global $con;


$id=intval($_POST['num']);
$nome=addslashes($_POST['nome']);
$telefone=addslashes($_POST['telefone']);

        //echo "<script>alert('Entreiii aqui again $urlImagem')</script>";
        //$i++;
        $sql="Update companhias set companhiaNome='$nome', companhiaTelefone='$telefone' where companhiaId='$id'";
        //echo $sql;
        mysqli_query($con,$sql);
        header("location:listaCompanhias.php");


?>