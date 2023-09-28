<?php
include_once("../php/backOffice.php");
global $con;

$id=intval($_POST['id']);

indexBO();
navBar();
drawTopBO();
$sql="select * from destinos where destinoId='$id'";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>
<div class="w-75 p-5 m-5">
        <h1>Editar Concelho</h1>
        <form class="p-5 mt-5" action="confirmarEditarDestino.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeDestino" class="form-label labelNome">NOME</label>
                <input type="text" class="form-control" id="nomeDestino" name="nome" value="<?php echo $dados['destinoNome'] ?>">
            </div>
            <div class="mb-3">
                <label for="DescricaoDestino" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="nomeDestino" name="descricao"><?php echo $dados['destinoDescricao'] ?></textarea>
            </div>

            <div id="image">
                <label id="">DESTINO - IMAGEM</label><br>
                <input type="file" class="mb-3" name="image" id="img" onchange="verificar()" value=<?php echo $dados['destinoImagemURL'] ?>><br>
                <img src="<?php echo $dados['destinoImagemURL'] ?>" alt="" id="ima" width="200px" height="200px" class="mb-3">
            </div>

            <div class="mb-3">
                <input type="text" hidden name="imagem" value=<?php echo $dados['destinoImagemURL'] ?>>
                <input type="text" hidden name="num" value=<?php echo $id ?>>
                <input type="button" class="btn btn-primary p-3" id="confirmaD" value="CONFIRMAR">
            </div>
        </form>
    </div>

    
<?php
drawBottomBO()
?>