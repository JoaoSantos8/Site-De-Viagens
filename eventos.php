<?php 

    include_once ("php/frontOffice.php");
    global $con;

    session_start();

    if (!isset($_SESSION['utilizadorId'])) {
        header('Location: login.php');
        exit;
    }

    drawTopEventosFO();
    navBarAtividades();
    atividadesP();
    navBarBottomFO();
    drawBottomFO();
?>