<?php 

    include_once ("php/frontOffice.php");

    session_start();

    if (!isset($_SESSION['utilizadorId'])) {
        header('Location: login.php');
        exit;
    }

    drawTopHoteisFO();
    navBarHoteis();
    hoteis();
    navBarBottomFO();
    drawBottomHoteisFO();
?>