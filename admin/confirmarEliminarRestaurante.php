<?php
include_once ("../php/backOffice.php");
global $con;



$id = intval($_POST['num']);

        $sql = "DELETE FROM restaurantes WHERE restauranteId = $id";
        mysqli_query($con, $sql);
        header("location:listaRestaurantes.php");

?>