<?php 

    include_once ("php/frontOffice.php");

    session_start();

    if (isset($_SESSION['utilizadorId'])) {
        session_destroy();
    }
    
    drawTopPPFO();
    navBarTop();
    slidePacotes(); 
    fundo();
    restaurantes();
    atividades();
    fundoFim();
    navBarBottomFO();
    drawBottomFO();
?>