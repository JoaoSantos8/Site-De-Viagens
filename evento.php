<?php 

    include_once ("php/frontOffice.php");

    session_start();

    if (!isset($_SESSION['utilizadorId'])) {
        header('Location: login.php');
        exit;
    }

    
    $id=intval($_GET['id']);

    drawTopEventosFO();
    navBarAtividade($id);
    atividade($id);
    recomendR();
    navBarBottomFO();
    drawBottomFO();

?>