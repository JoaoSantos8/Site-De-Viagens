<?php
include_once("php/frontOffice.php");
global $con;

session_start();

$id = intval($_POST['id']);

// Obter o valor do produto que estás a remover
$sqlValorProduto = "SELECT * FROM produtos WHERE produtoId = $id";
$resultValorProduto = mysqli_query($con, $sqlValorProduto);
$ValorProduto = mysqli_fetch_assoc($resultValorProduto);
$precoProduto = $ValorProduto['produtoPreco'];
$produtoNum= $ValorProduto['produtoNum'];
$categoria= $ValorProduto['produtoCategoria'];
$quantiProduto = $ValorProduto['produtoQuanti'];

$_SESSION['precoTotal']-$precoProduto*$quantiProduto;
// Remover o produto
$sqlRemoverProduto = "DELETE FROM produtos WHERE produtoId = $id";
mysqli_query($con, $sqlRemoverProduto);

// Atualizar o valor total na tabela carrinho
$num = $_SESSION['utilizadorId'];
$_SESSION['precoTotal']=$_SESSION['precoTotal']-$precoProduto*$quantiProduto;
$sqlAtualizarTotal = "UPDATE carrinho SET carrinhoPreco = $_SESSION[precoTotal]
                     WHERE carrinhoUtilizadorId = $num";

                     //echo $sqlAtualizarTotal;
mysqli_query($con, $sqlAtualizarTotal);

//Atualizar tabela viagens

if($categoria=="viagem"){
    $sqlviagem="UPDATE viagens set viagemLugares = viagemLugares+$quantiProduto WHERE viagemId='$produtoNum'";
}


header("location:carrinho.php");
?>
    