<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    
    $sql = "SELECT * FROM atividades INNER JOIN eventos ON atividadeEventoId = eventoId where eventoId=$id";
    $result = mysqli_query($con, $sql);
    // Continuar com o código usando $id
}else{
    

    $sql = "SELECT * FROM atividades INNER JOIN eventos ON atividadeEventoId = eventoId";
    $result = mysqli_query($con, $sql);
    echo "<script>
    $('#tit').remove();
    </script>";
}


?>

<div class="p-2 mt-5" id="tabela">
    <h1 id="tit">LISTA DO ATIVIDADES</h1>
    <form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisa">
    <div class="input-group">
            <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..." value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>
    <table class="table table-dark table-striped">
        <tr>
            <td colspan="6" id="cabeca">
                <a href="novoAtividade.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVA ATIVIDADE</a>
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
                Preço
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Evento
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
                    <?php echo $dados['atividadeId']; ?>
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['atividadeNome']; ?>
                </td>
                <td class="text-center align-middle">
                    <img src="<?php echo $dados['atividadeImagemURL']; ?>" width="100" height="100">
                </td>
                <td class="text-center align-middle">
                    
                    <?php if($dados['atividadePreco']=="0"){
                echo "GRÁTIS";
            }else{
              echo $dados['atividadePreco'] ?>€ / Bilhete<?php
            }
            ?>
                </td>
                
                <td class="text-center align-middle">
                    <?php echo $dados['eventoNome']; ?>
                </td>

                <td class="text-top">
                    <form method="post" enctype="multipart/form-data">
                        <div class="w-100" id="editar">
                            <input type="hidden" name="id" value="<?php echo $dados['atividadeId']; ?>">
                            <input type="hidden" name="destino" value="<?php echo $dados['eventoNome']; ?>">
                            <button formaction="editarAtividade.php" type="submit"
                                class="btn btn-primary w-75 m-2">Editar</button>
                        </div>
                        <div class="w-100" id="eliminar">
                            <input type="hidden" name="id" value="<?php echo $dados['atividadeId']; ?>">
                            <button formaction="eliminarAtividade.php" type="submit"
                                class="btn btn-danger w-75 m-2">Eliminar</button>
                        </div>
                        <div class="w-100" id="eliminar">
                            <input type="hidden" name="id" value="<?php echo $dados['atividadeId']; ?>">
                            <button formaction="listaEventos.php" type="submit"
                                class="btn btn-warning w-75 m-2">Eventos</button>
                        </div>
                    </form>
                </td>
            </tr>
            <?php
        echo "<script>\$('#tit').text('LISTA DE ATIVIDADES - " . $dados['eventoNome'] . "');</script>";

        }
        ?>
    </table>
    
</div>

<?php
drawBottomBO();
?>
