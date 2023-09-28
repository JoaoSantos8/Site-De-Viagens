<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();


$id=intval($_POST['id']);

$sql = "SELECT * FROM companhias WHERE companhiaId=$id";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result)
?>
<div class="w-75 p-5 m-5">
        <h1>Editar Companhia</h1>
        <form class="p-5 mt-5" action="confirmarEditarCompanhia.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeDestino" class="form-label labelNome">NOME</label>
                <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $dados['companhiaNome']?>">
            </div>

            <div class="mb-3">
                <label for="DescricaoDestino" class="form-label">Telefone</label>
                <input type="number" class="form-control" id="inputTel" name="telefone" value="<?php echo $dados['companhiaTelefone']?>">
            </div>

            <div class="mb-3">
                
                <input type="hidden" name="num" value="<?php echo $dados['companhiaId']; ?>">
                <input type="button" class="btn btn-primary p-3" id="confirmaComp" value="CONFIRMAR">
            </div>
        </form>
    </div>

    
<?php
drawBottomBO()
?>