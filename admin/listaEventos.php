<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM eventos INNER JOIN concelhos ON eventoConcelhoId = concelhoId WHERE eventoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
} else {
    $sql = "SELECT * FROM eventos INNER JOIN concelhos ON eventoConcelhoId = concelhoId";
    $result = mysqli_query($con, $sql);
}
?>
<h1>Lista de Eventos</h1>

<form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisaH">
    <div class="input-group">
        <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>
</form>

<div id="cabeca" class="mt-5">
    <a href="novoEvento.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVO EVENTO</a>
</div>

<div id="caixaContainer" class="w-100 d-flex flex-wrap">
    <!-- Aqui começa o php --->
    <?php


    while ($dados = mysqli_fetch_array($result)) {

        $sql = "SELECT * FROM atividades WHERE atividadeEventoId = {$dados['eventoId']}";
        $resultado = mysqli_query($con, $sql);
        ?>

    <div id="caixa" class="ml-5 w-25">

        <div id="nomeH">
            <?php echo $dados['eventoNome'] ?>
        </div>

        <div id="imgH"><img src="<?php echo $dados['eventoImagemURL'] ?>" width="100%" height="250px"></div>

        <div id="descH" class="descricao">

            <h4>Descrição</h4>
            <p class="texto-curto">
                <?php echo substr($dados['eventoDescricao'], 0, 50); ?>...
            </p>
            <p class="texto-longo">
                <?php echo $dados['eventoDescricao'] ?>
            </p>
            <a href="#" class="ver-mais">Ver mais</a>
        </div>

        <div id="precoH">
            <?php if($dados['eventoPreco']=="0"){
                echo "GRÁTIS";
            }else{
              echo $dados['eventoPreco'] ?>€ / Entrada<?php
            }
            ?>
        </div>

        <div id="conH">
            <?php echo $dados['concelhoNome'] ?>
        </div>

        <div id="emailH">
            <?php echo $dados['eventoEmail'] ?>
        </div>

        <div id="telefoneH">

            <div class="float-left w-50 align-midlle">
                <label>COMEÇA DIA</label><br>
                <?php echo date('d/m/Y', strtotime($dados['eventoDataC'])); ?>
            </div>

            <div class="float-right w-50">
                <label>ACABA DIA</label><br>
                <?php echo date('d/m/Y', strtotime($dados['eventoDataA'])); ?>
            </div>

        </div>

        <div id="ativ" style="height: auto;"><?php
            if (mysqli_num_rows($resultado) > 0) {?><h5>Atividades</h5><?php
                while ($dadosC = mysqli_fetch_array($resultado)) {
                    echo $dadosC['atividadeNome']."<br>";
                }
            } else {
                echo "Nenhuma Atividade";
            }
                        ?></div>
        <form method="post" class="w-100">

            <!-- Formulário para editar -->
                <div class="float-left p-1" style="width: 25%">
                    <input type="hidden" name="id" value="<?php echo $dados['eventoId'] ?>">
                    <input type="hidden" name="destino" value="<?php echo $dados['concelhoNome'] ?>">
                    <button formaction="editarEvento.php" type="submit" id="ediH" class="btn-primary w-100">Editar</button>
                </div>

                <!-- Formulário para excluir -->
                <div class="float-left p-1" style="width: 50%">
                    <input type="hidden" name="id" value="<?php echo $dados['eventoId'] ?>">
                    <button formaction="listaAtividades.php" type="submit" id="ati"
                        class="btn btn-warning w-100">Atividades</button>
                </div>

                <div class="float-right p-1" style="width: 25%">
                    <input type="hidden" name="id" value="<?php echo $dados['eventoId'] ?>">
                    <button formaction="eliminarEvento.php" type="submit" id="eliH"
                        class="btn btn-danger w-100">Eliminar</button>
                </div>

            </form>


        </div>

        <?php
    }
    ?>

</div>
<!-- Aqui começa o php --->


<?php
drawBottomBO()
    ?>