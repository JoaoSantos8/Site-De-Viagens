<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();


if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM destinos WHERE destinoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
}else{
    
    $sql = "SELECT * FROM destinos";
    $result = mysqli_query($con, $sql);
}
?>

<div class="p-2 mt-5" id="tabela">
    <h1>Lista de Concelhos</h1>
    <form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisa">
        <div class="input-group">
            <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..." value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>
    <table class="table table-dark table-striped">
        <tr>
            <td colspan="6" id="cabeca">
                <a href="novoDestino.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVO CONCELHO</a>
            </td>
        </tr>
        <tr>
            <th class="text-center col-12 col-sm-1 align-middle">
                Id
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Nome
            </th>
            <th class="text-center col-12 col-sm-1 align-middle" style="height: 100px !important;">
                Imagem
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Descrição
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Distrito
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Opções
            </th>
        </tr>

        <?php
        while ($dados = mysqli_fetch_array($result)) {
            $sql = "SELECT * FROM concelhos WHERE concelhoDestinoId = {$dados['destinoId']}";
            $resultado = mysqli_query($con, $sql);
            ?>
            <tr>
                <td class="text-center align-middle">
                    <?php echo $dados['destinoId']; ?>
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['destinoNome']; ?>
                </td>
                <td class="text-center align-middle">
                    <img src="<?php echo $dados['destinoImagemURL']; ?>" width="100" height="100">
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['destinoDescricao']; ?>
                </td>
                
                <td class="text-center align-middle">
                    <?php
                    if (mysqli_num_rows($resultado) > 0) {
                        while ($dadosC = mysqli_fetch_array($resultado)) {
                            echo $dadosC['concelhoNome'] . "<br><br>";
                        }
                    } else {
                        echo "Nenhum Concelho";
                    }
                    ?>
                </td>
                <td class="align-middle">
                    <form method="post">
                        <div class="w-100" id="editar">
                            <input type="hidden" name="id" value="<?php echo $dados['destinoId']; ?>">
                            <button formaction="editarDestino.php" type="submit"
                                class="btn btn-primary w-75 m-2">Editar</button>
                        </div>
                        <div class="w-100" id="eliminar">
                            <input type="hidden" name="id" value="<?php echo $dados['destinoId']; ?>">
                            <button formaction="eliminarDestino.php" type="submit"
                                class="btn btn-danger w-75 m-2">Eliminar</button>
                        </div>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<?php
drawBottomBO();
?>
