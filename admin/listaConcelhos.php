<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();


if (isset($_GET['q']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM concelhos INNER JOIN destinos ON concelhoDestinoId = destinoId WHERE concelhoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
}else{

    $sql = "SELECT * FROM concelhos INNER JOIN destinos ON concelhoDestinoId = destinoId";
    $result = mysqli_query($con, $sql);

}
?>

<div class="p-2 mt-5" id="tabela">
    <h1>Lista de Distrito</h1>
    <form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisa">
    <div class="input-group">
            <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..." value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>
    <table class="table table-dark table-striped">
        <tr>
            <td colspan="6" id="cabeca">
                <a href="novoConcelho.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVO DISTRITO</a>
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
                Pais
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
                    <?php echo $dados['concelhoId']; ?>
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['concelhoNome']; ?>
                </td>
                <td class="text-center align-middle">
                    <img src="<?php echo $dados['concelhoImagemURL']; ?>" width="100" height="100">
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['concelhoDescricao']; ?>
                </td>
                
                <td class="text-center align-middle">
                    <?php echo $dados['destinoNome']; ?>
                </td>

                <td class="text-top">
                    <form method="post" enctype="multipart/form-data">
                        <div class="w-100" id="editar">
                            <input type="hidden" name="id" value="<?php echo $dados['concelhoId']; ?>">
                            <input type="hidden" name="destino" value="<?php echo $dados['destinoNome']; ?>">
                            <button formaction="editarConcelho.php" type="submit"
                                class="btn btn-primary w-75 m-2">Editar</button>
                        </div>
                        <div class="w-100" id="eliminar">
                            <input type="hidden" name="id" value="<?php echo $dados['concelhoId']; ?>">
                            <button formaction="eliminarConcelho.php" type="submit"
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
