<?php
include_once ("../php/backOffice.php");
global $con;



$id = intval($_POST['num']);

        $sql = "DELETE FROM monumentos WHERE monumentoId = $id";
        mysqli_query($con, $sql);
        header("location:listaMonumentos.php");

?>