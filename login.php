<?php
include_once ("php/frontOffice.php");
global $con;

if (isset($_GET['erro'])) {
        $tipoErro = $_GET['erro'];
        
        if ($tipoErro === 'Campos_vazios') {
            echo "<script>alert('Preencha todos os campos obrigatórios.');</script>";
            
        } elseif ($tipoErro === 'Credenciais_incorretas') {
            echo "<script>alert('Credenciais incorretas. Por favor, verifique seus dados e tente novamente.');</script>";
            echo "<style>#inputEmailL { border-bottom: 5px solid red  !important;}</style>";
            echo "<style>#inputPassL { border-bottom: 5px solid red !important; }</style>";
        
        }
    }
drawTopFO();
navBarTopFO();
?>
<style>
    #navBarTop{
    height: 200px !important;
    background: transparent !important;
    z-index: 0;
    } 

    body{
    background: rgb(39,130,255) !important;
    background: linear-gradient(140deg, rgba(39,130,255,1) 2%, rgba(96,17,57,1) 87%) !important;
    height: 100vh;
    z-index: 2;
    }
</style>

    <h1 id="tituloL">Faça Login !!!</h1>

    <form action="confirmarLogin.php" method="post" id="formLogin" enctype="multipart/form-data">

        <input type="email" name="mail" id="inputEmailL" placeholder="Insira o Seu Email">

        <input type="password" name="passe" id="inputPassL" placeholder="Insira a Sua Password">

        <button id="confirmarL">Login</button>
    </form>




<?php

drawBottomFO();

?>