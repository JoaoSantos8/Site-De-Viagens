<?php 
include_once ("php/frontOffice.php");
global $con;

if (isset($_GET['erro'])) {
    $tipoErro = $_GET['erro'];
    
    if ($tipoErro === 'email_repetido') {
        echo "<script>alert('O utilizador já está registado');</script>";
        
    }
    // Adicione outros tipos de erro aqui, se necessário
}


drawTopSignUpFO();
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


    <form method="POST" id="signUpForm">
        
    <div id="signUpCima">
        <h1>Criar Sua Conta</h1>
    </div>

    <div id="signDados">

        <div id="dadosLeft">

        <input type="name" id="inputNome" name="nome" placeholder="Insira Seu Nome ...">
        <input type="email" id="inputEmail" name="email" placeholder="Insira Seu Email ...">
        <input type="tel" id="inputTelefone" name="telefone" placeholder="Insira Seu Telefone ...">


        </div>
        <div id="dadosRight">
        <input type="number" id="inputIdade" name="idade" placeholder="Insira Sua Idade ...">
        <input type="password" id="inputPass" name="pass" placeholder="Insira Sua Password ...">
        <input type="password" id="inputPassC" name="passConfirm" placeholder="Confirme Sua Password ...">
    </div>

    </div>


    <button id="signUpBaixo">
        <h2>CONFIRMAR</h2>
    </button>
    </form>


<?php
drawBottomSignUpFO();
?>