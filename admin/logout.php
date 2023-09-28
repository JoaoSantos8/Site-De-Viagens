<?php
include_once("../php/config.inc.php");
global $con;
    session_start();
    session_destroy();
    header("location:../index.php");

?>