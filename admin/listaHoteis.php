<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM hoteis INNER JOIN concelhos ON hoteisConcelhoId = concelhoId WHERE hotelNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
} else {
    $sql = "SELECT * FROM hoteis INNER JOIN concelhos ON hoteisConcelhoId = concelhoId";
    $result = mysqli_query($con, $sql);
}
?>
    <h1>Lista de Hoteis</h1>

    <form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisaH">
    <div class="input-group">
            <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..." value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>

            <div id="cabeca" class="ml-5 mt-5">
                <a href="novoHotel.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVO HOTEL</a>
            </div>

            <div id="caixaContainer" class="w-100 d-flex flex-wrap">
<!-- Aqui começa o php --->
<?php

    while($dados=mysqli_fetch_array($result)){

    $sql = "SELECT * FROM concelhos WHERE concelhoId = {$dados['concelhoId']}";
    $resultado = mysqli_query($con, $sql);

    ?>
            
            <div id="caixa" class="ml-5 w-25">

            <div id="nomeH"><?php echo $dados['hotelNome'] ?></div>

            <div id="imgH"><img src="<?php echo $dados['hotelImagemURL'] ?>" width="100%" height="250px"></div>

            <div id="descH" class="descricao">

            <h4>Descrição</h4>
            <p class="texto-curto"><?php echo substr($dados['hotelDescricao'], 0, 50); ?>...</p>
            <p class="texto-longo"><?php echo $dados['hotelDescricao']; ?></p>
            <a href="#" class="ver-mais">Ver mais</a>
            </div>

            <div id="precoH"><?php echo $dados['hotelPreco'] ?>€ / Noite</div>

            <div id="conH"><?php
            if (mysqli_num_rows($resultado) > 0) {
                while ($dadosC = mysqli_fetch_array($resultado)) {
                    echo $dadosC['concelhoNome'] . "<br><br>";
                }
            } else {
                echo "Nenhum Concelho";
            }
                        ?></div>

            <div id="emailH"><?php echo $dados['hotelEmail'] ?></div>

            <div id="telefoneH">Telefone : <?php echo $dados['hotelTelefone'] ?></div>

            <form method="post">

                        <!-- Formulário para editar -->
                        <div>
                            <input type="hidden" name="id" value="<?php echo $dados['hotelId'];  ?>">
                            <input type="hidden" name="destino" value="<?php echo $dados['concelhoNome']; ?>">
                            <button formaction="editarHotel.php" type="submit" id="ediH"
                                class="btn-primary">Editar</button>
                        </div>

                        <!-- Formulário para excluir -->
                        <div>
                            <input type="hidden" name="id" value="<?php echo $dados['hotelId'];  ?>">
                            <button formaction="eliminarHotel.php" type="submit" id="eliH"
                                class="btn btn-danger">Eliminar</button>
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