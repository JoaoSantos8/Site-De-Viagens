<?php
include_once ("../php/backOffice.php");
global $con;



$id = intval($_POST['num']);

        $sql = "DELETE FROM viagens WHERE viagemId = $id";
        mysqli_query($con, $sql);
        header("location:listaViagens.php");

?>