<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();


if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM companhias WHERE companhiaNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
} else {

    $sql = "SELECT * FROM companhias";
    $result = mysqli_query($con, $sql);
}
?>

<div class="p-2 mt-5" id="tabela">
    <h1>Lista de Companhias</h1>
    <form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisa">
        <div class="input-group">
            <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
                value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>
    <table class="table table-dark table-striped">
        <tr>
            <td colspan="4" id="cabeca">
                <a href="novoCompanhia.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVA COMPANHIA</a>
            </td>
        </tr>
        <tr>
            <th class="text-center col-12 col-sm-1 align-middle">
                Id
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Nome
            </th>
            <th class="text-center col-12 col-sm-1 align-middle">
                Contacto
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Opções
            </th>
        </tr>

        <?php
        while ($dados = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td class="text-center align-middle">
                    <?php echo $dados['companhiaId']; ?>
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['companhiaNome']; ?>
                </td>
                <td class="text-center align-middle w-25">
                    <?php echo $dados['companhiaTelefone']; ?>
                </td>

                <td class="align-middle">
                    <form method="post">
                        <div class="w-100" id="editar">
                            <input type="hidden" name="id" value="<?php echo $dados['companhiaId']; ?>">
                            <button formaction="editarCompanhia.php" type="submit"
                                class="btn btn-primary w-75 m-2">Editar</button>
                        </div>
                        <div class="w-100" id="eliminar">
                            <button formaction="listaViagens.php" type="submit"
                                class="btn btn-warning w-75 m-2">Lista Viagens</button>
                        </div>
                        <div class="w-100" id="eliminar">
                            <input type="hidden" name="id" value="<?php echo $dados['companhiaId']; ?>">
                            <button formaction="eliminarCompanhia.php" type="submit"
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