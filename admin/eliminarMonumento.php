<?php
include_once("../php/backOffice.php");
global $con;

$id=intval($_POST['id']);
$escolhaAnterior = isset($_POST['destino']) ? mysqli_real_escape_string($con, $_POST['destino']) : '';

indexBO();
navBar();
drawTopBO();
$sql="select * from monumentos where monumentoId=$id";
$escolhaAnterior = isset($_POST['destino']) ? mysqli_real_escape_string($con, $_POST['destino']) : '';
$result=mysqli_query($con,$sql);
$dados= mysqli_fetch_array($result);
?>
<div class="w-75 p-5 m-5">
        <h1>Eliminar Monumento</h1>
        <form class="p-5 mt-5" action="confirmarEliminarMonumento.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeConcelho" class="form-label labelNome">NOME</label>
                <input type="text" disabled class="form-control" id="nomeConcelho" name="nome" value="<?php echo $dados['monumentoNome'] ?>">
            </div>
            <div class="mb-3">
                <label for="descricaoConcelho" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" disabled  id="descricaoConcelho" name="descricao"><?php echo $dados['monumentoDescricao'] ?></textarea>
            </div>

            <div id="image">
                <label id="">DESTINO - IMAGEM</label><br>
                <input type="file" disabled class="mb-3" name="image" id="img" onchange="verificar()" value=<?php echo $dados['monumentoImagemURL'] ?>><br>
                <img src="<?php echo $dados['monumentoImagemURL'] ?>" alt="" id="ima" width="200px" height="200px" class="mb-3">
            </div>


            <label class="mb-5 p-2"> DESTINOS <br>
                <select name="destino" disabled  id="slect" class="p-3 mb-5 mt-2 w-100">
        <?php 

        $sql = "SELECT * FROM concelhos";
        $resultado = mysqli_query($con, $sql);

        while ($dadosC = mysqli_fetch_array($resultado)) {
            $selected = ($dadosC['concelhoNome'] == $escolhaAnterior) ? 'selected' : '';
            echo '<option ' . $selected . '>' . $dadosC['concelhoNome'] . '</option>';
        }
        ?>
    </select>
            <div class="mb-3">
                <input type="text" hidden name="num" value=<?php echo $id ?>>
                <input type="submit" class="btn btn-danger p-3" value="CONFIRMAR">
            </div>
        </form>
    </div>

    
<?php
drawBottomBO()
?>