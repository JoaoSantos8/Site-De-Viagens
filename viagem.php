<?php 

    include_once ("php/frontOffice.php");
    global $con;

    session_start();

    if (!isset($_SESSION['utilizadorId'])) {
        header('Location: login.php');
        exit;
    }

    $id=intval($_GET['id']);
    
    drawTopViagensFO();
    navBarViagem($id);
    viagem($id);
    navBarBottomFO();
    drawBottomViagensFO();
?>