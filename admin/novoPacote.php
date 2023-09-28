<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();
?>
<div class="w-75 p-5 m-5">
    <h1>Novo Pacote</h1>
    <form class="p-5 mt-5" action="confirmaNovoPacote.php" method="post" enctype="multipart/form-data" id="formulario">

        <div class="mb-5">
            <label for="nomePacote" class="form-label labelNome">NOME</label>
            <input type="text" class="form-control" id="inputNome" name="nome">
        </div>

        <label class="mb-5 p-3"> PACOTE - VIAGEM <br></label>
        <select name="viagem" id="slect" class="p-3 mt-1 w-75 text-center"
            style="color: black; font-size:18pt; padding-right: 10px;">
            <?php

            $sql = "SELECT * from viagens INNER JOIN destinos on destinoId=viagemDestinoId";
            $result = mysqli_query($con, $sql);

            while ($dados = mysqli_fetch_array($result)) { ?>
                <option value="<?php echo $dados['viagemPreco'] ?>" style="color: black; font-size:18pt; padding-right: 10px;">
                    &nbsp;| Destino
                    <?php echo $dados['destinoNome'] ?>&nbsp;|&nbsp;-&nbsp;| Data &nbsp;
                    <?php echo $dados['viagemData'] ?>|&nbsp;-&nbsp;| Preço &nbsp;
                    <?php echo $dados['viagemPreco'] ?>€ |&nbsp;
                </option>

                <?php
            } ?>
        </select>
        <br>

        <label class="mb-5 p-3"> PACOTE - HOTEL <br></label>
        <select name="hotel" id="slecte" class="p-3 mt-1 w-75 text-center"
            style="color: black; font-size:18pt; padding-right: 10px;">
            <?php

            $sql = "SELECT * from hoteis INNER JOIN concelhos on concelhoId=hoteisConcelhoId";
            $resultado = mysqli_query($con, $sql);

            while ($dadosH = mysqli_fetch_array($resultado)) { ?>
                <option value="<?php echo $dadosH['hotelPreco'] ?>" style="color: black; font-size:18pt; padding-right: 10px;">
                    |&nbsp;Nome:&nbsp;<?php echo $dadosH['hotelNome'] ?>&nbsp;| -&nbsp;| Localização:&nbsp;<?php echo $dadosH['concelhoNome'] ?>&nbsp; | -&nbsp; | Preço:&nbsp;<?php echo $dadosH['hotelPreco'] ?>€ |&nbsp;
                </option>


            <?php } ?>
        </select>
        <br>PREÇO PROVISÓRIO:<label id="opcaoSelecionada" class="p-3"> </label>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <div class="mb-3">
            <input type="button" class="btn btn-primary p-3 mt-3" id="confirmaP" value="CONFIRMAR">
        </div>
    </form>
</div>


<?php
drawBottomBO()
    ?>