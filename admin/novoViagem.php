<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

$sql = "SELECT * from destinos";
$result = mysqli_query($con, $sql);
?>
<div class="w-75 p-5 m-5">
    <h1>Novo Evento</h1>
    <form class="p-5 mt-5" action="confirmaNovoViagem.php" method="post" enctype="multipart/form-data" id="formulario">

        <div class="mb-3 p-3">
            <label for="nomeHotel" class="form-label labelNome">TELEFONE PARA SUPORTE</label>
            <input type="number" class="form-control" id="inputTel" name="telefone">
        </div>

        <div class="mb-3 w-50 p-3  float-left">
            <label for="data" class="form-label">DATA</label>
            <input type="date" class="form-control" id="inputDataC" name="dataC">
        </div>

        <div class="mb-3 w-50 p-3 float-right">
            <label for="data" class="form-label">LUGARES NO AVIÃO</label>
            <input type="number" class="form-control" id="inputLugares" name="lugares">
        </div>
        <br>

        <div class="mb-3 w-50 p-3 float-left">
            <label for="data" class="form-label">HORA QUE PARTE</label>
            <input type="time" class="form-control" id="inputHoraC" name="horaC">
        </div>

        <div class="mb-3 w-50 p-3 float-right">
            <label for="data" class="form-label">HORA QUE ATERRA</label>
            <input type="time" class="form-control" id="inputHoraA" name="horaA">
        </div>

        <div class="mb-3 p-3">
            <label for="email" class="form-label">PREÇO</label>
            <input type="number" class="form-control" id="inputPreco" name="preco" placeholder="Preço do bilhete">
        </div>

        <label class="mb-5 p-3"> CLASSE - VIAGEM <br></label>
        <select name="classe" id="slect" class="p-3 mt-1 w-25 text-center">
            <option value="Classe Economica">Classe Economica</option>
            <option value="Classe Executiva">Classe Executiva</option>>
        </select>
        <br>

        <label class="mb-5 p-3"> TIPO - VIAGEM <br></label>
        <select name="tipo" id="slect" class="p-3 mt-1 w-25 text-center">
            <option value="Ida">Ida</option>
            <option value="Ida e Volta">Ida - Volta</option>>
        </select>
        <br>

        <label class="mb-5 p-3 "> DESTINO <br></label>
        <select name="destino" id="slect" class="p-3 mt-1 w-25 text-center">
            <?php
            while ($dados = mysqli_fetch_array($result)) { ?>
                <option>
                    <?php echo $dados['destinoNome'] ?>
                </option>
                <?php
            }
            ?>
        </select>
        <br>
        <?php

        $sql = "SELECT * from destinos";
        $resultd = mysqli_query($con, $sql);

?>
        <label class="mb-5 p-3 "> ORIGEM <br></label>
        <select name="origem" id="slect" class="p-3 mt-1 w-25 text-center">
            <?php
            while ($dadosO = mysqli_fetch_array($resultd)) { ?>
                <option>
                    <?php echo $dadosO['destinoNome'] ?>
                </option>
                <?php
            }
            ?>
        </select>
        <br>
        <?php

        $sql = "SELECT * from companhias";
        $resulte = mysqli_query($con, $sql);

        ?>
        <label class="mb-5 p-3 "> COMPANHIA <br></label>
        <select name="companhia" id="slect" class="p-3 mt-1 w-25 text-center">
            <?php
            while ($dadosC = mysqli_fetch_array($resulte)) { ?>
                <option>
                    <?php echo $dadosC['companhiaNome'] ?>
                </option>
                <?php
            }
            ?>  
        </select>
        <div class="mb-3">
            <input type="button" class="btn btn-primary p-3 mt-3" id="confirmaVia" value="CONFIRMAR">
        </div>
    </form>
</div>


<?php
drawBottomBO()
    ?>