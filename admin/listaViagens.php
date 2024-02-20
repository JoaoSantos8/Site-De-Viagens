<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM viagens INNER JOIN companhias ON viagemCompanhiaId = companhiaId 
    INNER JOIN destinos ON viagemDestinoId = destinoId
    WHERE companhiaNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
} else {
    $sql = "SELECT * FROM viagens INNER JOIN companhias ON viagemCompanhiaId = companhiaId
    INNER JOIN destinos ON viagemDestinoId = destinoId
    ";
    $result = mysqli_query($con, $sql);
}
?>
<h1>Lista de Viagens</h1>

<form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisaH">
    <div class="input-group">
        <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>
</form>

<div id="cabeca" class="mt-5">
    <a href="novoViagem.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVA VIAGEM</a>
</div>

<div id="caixaContainer" class="w-100 d-flex flex-wrap">
    <!-- Aqui começa o php --->
    <?php

    while ($dados = mysqli_fetch_array($result)) {

        $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemChegadaDestinoId']}";
        $chegada = mysqli_query($con, $sql);
        $chegadas = mysqli_fetch_array($chegada);

        ?>

    <div id="caixa" class="ml-5 w-25">

        <div id="nomeH" style="color: white;" class="w-50 float-left">
            De <?php echo $dados['destinoNome'] ?>
        </div>

        <div id="nomeH" style="color: white;" class="w-50 float-right">
            Para <?php echo $chegadas['destinoNome'] ?>
        </div>
        

        <div id="dataV" style="margin-top: 70px;">
            <?php echo date('d/m/Y', strtotime($dados['viagemData'])); ?>
        </div>

        <div id="lugares">
            <?php echo $dados['viagemLugares'] ?>&nbsp; Lugares
        </div>



        <div id="precoV">
            <?php echo $dados['viagemPreco'] ?>€ / Bilhete
        </div>

        <div id="horarioH">

            <div id="partidaV">Partida</div>
            <div id="chegadaV">Chegada</div>

        </div>

        <div id="horarioH">
            <div id="hChe">
                <?php echo date('H:i', strtotime($dados['viagemIni'])); ?>
            </div>

            <div id="hChe">
                <?php echo date('H:i', strtotime($dados['viagemChegada'])); ?>
            </div>
        </div>
        <div id="telefoneH">Suporte Telefónico:
            <?php echo $dados['viagemTelefone'] ?>
        </div>

        <div id="tipoV">


        <?php echo $dados['viagemTipo'] ?>

        </div>

        <div id="classeV">


        <?php echo $dados['viagemClasse'] ?>

        </div>

        <form method="post" class="w-100">

            <!-- Formulário para editar -->
                <div class="float-left p-1" style="width: 25%">
                    <input type="hidden" name="id" value="<?php echo $dados['viagemId'] ?>">
                    <input type="hidden" name="destino" value="<?php echo $dados['destinoNome'] ?>">
                    <input type="hidden" name="origem" value="<?php echo $chegadas['destinoNome'] ?>">
                    <input type="hidden" name="comapnhia" value="<?php echo $dados['companhiaNome'] ?>">
                    <button formaction="editarViagem.php" type="submit" id="ediH" class="btn-primary w-100">Editar</button>
                </div>

                <!-- Formulário para excluir -->
                <div class="float-left p-1" style="width: 50%">
                    <input type="hidden" name="id" value="<?php echo $dados['viagemId'] ?>">
                    <button formaction="listaCompanhias.php" type="submit" id="ati"
                        class="btn btn-warning w-100">Companhia</button>
                </div>

                <div class="float-right p-1" style="width: 25%">
                    <input type="hidden" name="id" value="<?php echo $dados['viagemId'] ?>">
                    <button formaction="eliminarViagem.php" type="submit" id="eliH"
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