<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM pacotes INNER JOIN viagens ON pacoteViagemId = viagemId 
    INNER JOIN hoteis ON pacoteHotelId = hotelId
    WHERE pacoteNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
} else {
    
    $sql = "SELECT * FROM pacotes INNER JOIN viagens ON pacoteViagemId = viagemId 
    INNER JOIN hoteis ON pacoteHotelId = hotelId
    ";

    $result = mysqli_query($con, $sql);
}
?>
<h1>Lista de Pacotes</h1>

<form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisaH">
    <div class="input-group">
        <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>
</form>

<div id="cabeca" class="mt-5">
    <a href="novoPacote.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVO PACOTE</a>
</div>

<div id="caixaContainer" class="w-75 d-flex flex-wrap ml-5">
    <!-- Aqui começa o php --->
    <?php

    while ($dados = mysqli_fetch_array($result)) {

        $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemDestinoId']}";
        $resultado = mysqli_query($con, $sql);
        $dadosD =mysqli_fetch_array($resultado);

        $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemChegadaDestinoId']}";
        $resultd = mysqli_query($con, $sql);
        $chegadas =mysqli_fetch_array($resultd);
        ?>

    <div id="caixaHV" class="ml-5 w-100">

        <h1 class="text-center p-2"> Pacote <?php echo $dados['pacoteNome']; ?></h1>


    <!-- Caixa da esquerda -->
    <div class="w-50 float-left p-2" style="height: auto;">
        <div id="nomeH" class="float-left ml-5" style="color: white;">
            De:

            <?php echo $dadosD['destinoNome'] ?>
        </div>

        <div id="nomeH" class="float-right mr-5" style="color: white;">
            Para:

            <?php echo $chegadas['destinoNome'] ?>
        </div>

        <div id="dataV" style="margin-top: 70px">
            <?php echo date('d/m/Y', strtotime($dados['viagemData'])); ?>
        </div>

        <div id="lugares">
            <?php echo $dados['viagemPreco'] ?>&nbsp; Lugares
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


        <div id="precoT">
        
        
        <li>1 DIA : &nbsp; <?php echo $dados['viagemPreco']+ $dados['hotelPreco'] ?>€</li>
        <li>5 DIA : &nbsp; <?php echo $dados['hotelPreco']*5+$dados['viagemPreco']?>€</li>
        <li>1 SEMANA: &nbsp; <?php echo $dados['hotelPreco']*7+$dados['viagemPreco']?>€</li>
    
    
    </div>

    </div>
    <!-- Fim da caixa da esquerda -->

    <!-- Caixa direita -->
    <div class="w-50 float-right p-2" >
    <?php  
    $sql = "SELECT * FROM concelhos WHERE concelhoId = {$dados['hoteisConcelhoId']}";
    $resulta = mysqli_query($con, $sql);
    ?>
    <div id="nomeHV">Hotel <?php echo $dados['hotelNome'] ?></div>

        <div id="imgHV"><img src="<?php echo $dados['hotelImagemURL'] ?>" width="100%" height="300px"></div>

        <div id="descHV" class="descricao">

        <h4>Descrição</h4>
        <p class="texto-curto"><?php echo substr($dados['hotelDescricao'], 0, 50); ?>...</p>
        <p class="texto-longo"><?php echo $dados['hotelDescricao']; ?></p>
        <a href="#" class="ver-mais">Ver mais</a>
        </div>

        <div id="precoH"><?php echo $dados['hotelPreco'] ?>€ / Noite</div>

        <div id="conH"><?php
        if (mysqli_num_rows($resulta) > 0) {
            while ($dadosC = mysqli_fetch_array($resulta)) {
                echo $dadosC['concelhoNome'] . "<br><br>";
            }
        } else {
            echo "Nenhum Concelho";
        }
                    ?></div>

        <div id="emailH"><?php echo $dados['hotelEmail'] ?></div>

        <div id="telefoneHV">Telefone : <?php echo $dados['hotelTelefone'] ?></div>
        </div>
    </div>
    <!--Fim da caixa direita -->
        <form method="post" class="w-100 ml-5 mb-5">

            <!-- Formulário para editar -->
                <div class="float-left p-1" style="width: 50%">
                    <input type="hidden" name="id" value="<?php echo $dados['pacoteId'] ?>">
                    <input type="hidden" name="viagem" value="<?php echo $dadosD['destinoNome'] ?>">
                    <input type="hidden" name="hotel" value="<?php echo $dados['hotelNome'] ?>">
                    <button formaction="editarPacote.php" type="submit" id="ediH" class="btn-primary w-100">Editar</button>
                </div>

                <!-- Formulário para excluir -->

                <div class="float-right p-1" style="width: 50%">
                    <input type="hidden" name="id" value="<?php echo $dados['pacoteId'] ?>">
                    <button formaction="eliminarPacote.php" type="submit" id="eliH"
                        class="btn btn-danger w-100">Eliminar</button>
                </div>

            </form>


    

        <?php
    }
    ?>


</div>
<!-- Aqui começa o php --->


<?php
drawBottomBO()
    ?>