<?php
include_once ("../php/backOffice.php");
global $con;



$id = intval($_POST['num']);

        $sql = "DELETE FROM hoteis WHERE hotelId = $id";
        mysqli_query($con, $sql);
        header("location:listaHoteis.php");

?>