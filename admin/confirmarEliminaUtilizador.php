<?php
include_once ("../php/backOffice.php");
global $con;


$id=intval($_POST['num']);

        $sql="delete from utilizadores where utilizadorId='$id'";
        
        mysqli_query($con,$sql);
        header("location:listaUtilizadores.php");


?>
?>