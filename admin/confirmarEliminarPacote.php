<?php
include_once ("../php/backOffice.php");
global $con;



$id = intval($_POST['num']);

        $sql = "DELETE FROM pacotes WHERE pacoteId = $id";
        mysqli_query($con, $sql);
        header("location:listaPacotes.php");

?>