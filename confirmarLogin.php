<?php
include_once ("php/frontOffice.php");
global $con;

require_once('php/config.inc.php');

session_start();

if(isset($_POST['mail']) && isset($_POST['passe'])){
    if(empty($_POST["mail"]) || empty($_POST["passe"])){
        header("Location: login.php?erro=Campos_vazios");
        exit;
    } else {
        $email = addslashes($_POST['mail']);
        $pass = addslashes($_POST['passe']);

        $sql = "SELECT * FROM utilizadores WHERE utilizadorEmail = '$email' AND utilizadorPass = '$pass'";
        $sql_query = $con->query($sql);
        $result = $sql_query->num_rows;

        if($result == 1){
            $user = $sql_query->fetch_assoc();

            $_SESSION['utilizadorNome'] = $user['utilizadorNome'];
            $_SESSION['utilizadorCargo'] = $user['utilizadorCargo'];
            $_SESSION['utilizadorEmail'] = $user['utilizadorEmail'];
            $_SESSION['utilizadorIdade'] = $user['utilizadorIdade'];
            $_SESSION['utilizadorTelefone'] = $user['utilizadorTelefone'];
            $_SESSION['utilizadorImagemURL'] = $user['utilizadorImagemURL'];
            $_SESSION['utilizadorId'] = $user['utilizadorId'];

            header("Location: paginaPrincipal.php");
        } else {
            header("Location: login.php?erro=Credenciais_incorretas");
            exit;
        }
    }
}

?>
