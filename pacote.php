<?php 

    include_once ("php/frontOffice.php");

    session_start();

    if (!isset($_SESSION['utilizadorId'])) {
        header('Location: login.php');
        exit;
    }

    
    $id=intval($_GET['id']);

    drawTopPacoteFO();
    navBarPacotes($id);
    pacote($id);
    //recomendPais();
    navBarBottomFO();
    drawBottomPacotesFO();

?>