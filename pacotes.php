<?php

include_once("php/frontOffice.php");
global $con;

session_start();

if (!isset($_SESSION['utilizadorId'])) {
    header('Location: login.php');
    exit;
}

drawTopPacotesFO();
navBarPacote();
pacotesCima();
pacotes();
navBarBottomFO();
drawBottomPacotesFO();
?>