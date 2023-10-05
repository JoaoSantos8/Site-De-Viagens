<?php 

include_once("php/frontOffice.php");
global $con;

session_start();

if (!isset($_SESSION['utilizadorId'])) {
    header('Location: login.php');
    exit;
}

$id = intval($_POST['id']);
$nome = addslashes($_POST['nomeProduto']);
$quanti = intval($_POST['quantidade']);
$preco = floatval($_POST['preco']);
$num = $_SESSION['utilizadorId'];

$sql = "INSERT INTO produtos VALUES (0, '$nome', '$num','hotel', '$quanti', '$preco','$id')";
mysqli_query($con, $sql);


$_SESSION['precoTotal'] += $preco * $quanti;
// Verificar se já existe um registro com o mesmo carrinhoProdutoId
$sqlVerificar = "SELECT * FROM carrinho WHERE carrinhoUtilizadorId = '$num'";
$resultVerificar = mysqli_query($con, $sqlVerificar);

if (mysqli_num_rows($resultVerificar) == 0) {
    // Não existe, fazer o insert
    
    $sqli = "INSERT INTO carrinho (carrinhoPreco, carrinhoUtilizadorId) 
             VALUES (0, '$_SESSION[precoTotal]', '$num')";
    mysqli_query($con, $sqli);
    header("location:carrinho.php");
} else {
    // Já existe, atualizar o valor na tabela carrinho
    $sqli = "UPDATE carrinho SET carrinhoPreco = '$_SESSION[precoTotal]' 
             WHERE carrinhoUtilizadorId = '$num'";
    mysqli_query($con, $sqli);
    header("location:carrinho.php");
}
//echo "Preço Total: ".$_SESSION['precoTotal']." <br>";
//echo "Preço Uni: ".$preco." <br>";
//echo "Quantidade: ".$quanti;
?>
