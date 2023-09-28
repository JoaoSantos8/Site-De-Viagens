<?php
include_once("../php/backOffice.php");
global $con;

$id = intval($_POST['id']);

indexBO();
navBar();
drawTopBO();
$sql = "select * from companhias where companhiaId='$id'";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);

?>
<div class="w-75 p-5 m-5">
    <h1>Eliminar Companhia</h1>
    <form class="p-5 mt-5" action="confirmarEliminarCompanhia.php" method="post" enctype="multipart/form-data"
        id="formulario">
        <div class="mb-3">
            <label for="nomeDestino" class="form-label labelNome">NOME</label>
            <input type="text" class="form-control" id="nomeDestino" name="nome"
            disabled value="<?php echo $dados['companhiaNome'] ?>">
        </div>
        <div class="mb-3">
            <label for="DescricaoDestino" class="form-label">DESCRIÇÃO</label>
            <textarea class="form-control" id="nomeDestino"
            disabled name="descricao"><?php echo $dados['companhiaTelefone'] ?></textarea>
        </div>

        <div class="mb-3">
            <input type="text" hidden name="num" value=<?php echo $id ?>>
            <input type="submit" class="btn btn-danger p-3" value="CONFIRMAR">
        </div>
    </form>
</div>


<?php
drawBottomBO()
    ?>