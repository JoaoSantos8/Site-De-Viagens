<?php 

    include_once ("php/frontOffice.php");

    session_start();

    if (isset($_SESSION['utilizadorId'])) {
        session_destroy();
    }
    
    drawTopFO();
    navBarTop();
    slidePacotes(); 
    fundo();
    restaurantes();
    atividades();
    fundoFim();
    navBarBottomFO();
    drawBottomFO();
?>