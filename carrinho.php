<?php 

include_once("php/frontOffice.php");
global $con;

session_start();

if (!isset($_SESSION['utilizadorId'])) {
    header('Location: login.php');
    exit;
}
$num = $_SESSION['utilizadorId'];

$sql = "SELECT * FROM produtos WHERE produtoUtilizador='$num'";
$result = mysqli_query($con, $sql);

drawTopFO();
navBarCarrinho();
?>

<h1 class="p-5 text-center w-75 mx-auto d-block mt-5" style="background-color: #2782ff;">Carrinho de <?php echo $_SESSION['utilizadorNome'] ?></h1>

<table class="text-center w-75 mx-auto rounded" style="font-size:18pt; border:5px solid #2782ff; ">

<thead>
<tr>
    <td class="p-3" style="width:20%"><strong>Produto</strong></td>
    <td class="p-3" style="width:20%"><strong>Quantidade</strong></td>
    <td class="p-3" style="width:20%"><strong>Preço</strong></td>
    <td class="p-3" style="width:20%"><strong>Categoria</strong></td>
    <td class="p-3" style="width:20%"><strong>Opções</strong></td>
</tr>
</thead>

<tbody>
<?php
while ($dados = mysqli_fetch_array($result)) { ?>
    <tr>
        <td class="p-3"><?php echo $dados['produtoNome'] ?></td>
        <td class="p-3"><?php echo $dados['produtoQuanti'] ?></td>
        <td class="p-3"><?php echo $dados['produtoPreco'] ?>€</td>
        <td class="p-3"><?php echo $dados['produtoCategoria'] ?></td>
        <td class="align-middle p-2">
                    <form method="post">
                        <div class="w-100" id="eliminar">
                            <input type="hidden" name="id" value="<?php echo $dados['produtoId']; ?>">
                            <button formaction="eliminarProduto.php" type="submit"
                                class="btn btn-danger w-75 m-2">Eliminar Produto</button>
                        </div>
                    </form>
                </td>
    </tr>
<?php } ?>

<!-- Linha adicional para exibir o preço total acumulado -->
<tr>
    <td class="p-3"><strong>Preço Total</strong></td>
    <td class="p-3"><strong>
        <?php 
        
        if (isset($_SESSION['precoTotal'])  && $_SESSION['precoTotal']!=0) {
            echo $_SESSION['precoTotal'] . '€';
        } else {
            echo '<font style="color:red;"> CARRINHO VAZIO </font>';
        }
        ?>
    </strong></td>
    <td></td>
    <td></td>
    <td>
<?php 
            $sql = "SELECT * FROM produtos WHERE produtoUtilizador='$num'";
            $result = mysqli_query($con, $sql);
            $dados = mysqli_fetch_array($result);
            ?>
        <?php if (isset($dados['produtoNum'])){?>
        <form action="limparCarrinho.php" method="post">
            
            <input type="hidden" name="id" value="<?php echo $dados['produtoNum'] ?>">
            <input type="hidden" name="categoria" value="<?php echo $dados['produtoCategoria'] ?>">
            <input type="submit" value="Limpar Carrinho" id="limparCarrinho" class="btn btn-info">
        </form>
<?php }
//$_SESSION['precoTotal']=0;?>
    </td>
</tr>
</tbody>

</table>

<?php
navBarBottomFO();
drawBottomFO();
?>
