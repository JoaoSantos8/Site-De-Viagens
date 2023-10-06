<?php
include_once("php/frontOffice.php");
global $con;

session_start();



$sql = 'SELECT * FROM produtos WHERE produtoUtilizador = ' . $_SESSION['utilizadorId'];
$result = mysqli_query($con, $sql);

while ($dados = mysqli_fetch_array($result)) {

    if($dados['produtoCategoria']=='viagem'){
        $contV=$dados['produtoQuanti'];
        $sql = "UPDATE viagens SET viagemLugares = viagemLugares + $contV WHERE viagemId = " . $dados['produtoNum'];
        //echo $sql;
        mysqli_query($con, $sql);
    }

}

$_SESSION['precoTotal']=0;
$sql='DELETE FROM produtos WHERE produtoUtilizador='. $_SESSION['utilizadorId'];


mysqli_query($con, $sql);






    header("location:carrinho.php");
?>
    