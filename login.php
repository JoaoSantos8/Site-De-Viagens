<?php
include_once ("php/frontOffice.php");
global $con;

if (isset($_GET['erro'])) {
        $tipoErro = $_GET['erro'];
        
        if ($tipoErro === 'Campos_vazios') {
            echo "<script>alert('Preencha todos os campos obrigatórios.');</script>";
            
        } elseif ($tipoErro === 'Credenciais_incorretas') {
            echo "<script>alert('Credenciais incorretas. Por favor, verifique seus dados e tente novamente.');</script>";
            echo "<style>#inputEmailL { border-color: red  !important;}</style>";
            echo "<style>#inputPassL { border-color: red !important; }</style>";
        
        }
        // Adicione outros tipos de erro aqui, se necessário
    }
drawTopFO();
navBarTopFO();
?>


        <form action="confirmarLogin.php" method="post" id="formLogin" enctype="multipart/form-data">
        <div id="cardL"></div>
        <div id="insDadosL">
            
        <h2 id="tDadosL" class="text-center mb-5">LOGIN</h2>
        
        <label id="emailL" class="text-center">EMAIL</label><input type="email" name="mail" placeholder="Escreva Seu Email" id="inputEmailL" class="" required>
        <label id="passL" class="text-center">PALAVRA - CHAVE</label><input type="password" name="passe" placeholder="Escreva Sua Password" id="inputPassL" class="" required>
        
        <input type="button" id="loginL" value="LOGIN" class="text-center p-2">
        
        </div>
</form>




<?php

drawBottomFO();

?>