<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();


$id = intval($_POST['id']);
$escolhaAnterior = isset($_POST['destino']) ? mysqli_real_escape_string($con, $_POST['destino']) : '';
$escolhaAnteriorComp = isset($_POST['companhia']) ? mysqli_real_escape_string($con, $_POST['companhia']) : '';


$sql = "SELECT * from viagens where viagemId=$id";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);
?>


<div class="w-75 p-5 m-5">
    <h1>Edita Viagem</h1>
    <form class="p-5 mt-5" action="confirmarEliminarViagem.php" method="post" enctype="multipart/form-data" id="formulario">

        <div class="mb-3 p-3">
            <label for="nomeHotel" class="form-label labelNome">TELEFONE PARA SUPORTE</label>
            <input type="number" disabled class="form-control" id="inputTel" name="telefone" value="<?php  echo $dados['viagemTelefone'] ?>">
        </div>

        <div class="mb-3 w-50 p-3  float-left">
            <label for="data" class="form-label">DATA</label>
            <input type="date" disabled class="form-control" id="inputDataC" name="dataC" value="<?php  echo $dados['viagemData'] ?>">
        </div>

        <div class="mb-3 w-50 p-3 float-right">
            <label for="data" class="form-label">LUGARES NO AVIÃO</label>
            <input type="number" disabled class="form-control" id="inputLugares" name="lugares" value="<?php  echo $dados['viagemLugares'] ?>">
        </div>
        <br>

        <div class="mb-3 w-50 p-3 float-left">
            <label for="data" class="form-label">HORA QUE PARTE</label>
            <input type="time" disabled class="form-control" id="inputHoraC" name="horaC" value="<?php  echo $dados['viagemIni'] ?>">
        </div>

        <div class="mb-3 w-50 p-3 float-right">
            <label for="data" class="form-label">HORA QUE ATERRA</label>
            <input type="time" disabled class="form-control" id="inputHoraA" name="horaA" value="<?php  echo $dados['viagemChegada'] ?>">
        </div>

        <div class="mb-3 p-3">
            <label for="email" class="form-label">PREÇO</label>
            <input type="number" class="form-control" id="inputPreco" name="preco" placeholder="Preço do bilhete" value="<?php  echo $dados['viagemPreco'] ?>">
        </div>

        <label class="mb-5 p-3"> CLASSE - VIAGEM <br></label>
        <select name="classe" disabled id="slect" class="p-3 mt-1 w-25 text-center">
            <option value="Classe Economica" <?php if ($dados['viagemClasse'] == 'Classe Economica') echo 'selected'; ?>>Classe Economica</option>
            <option value="Classe Executiva" <?php if ($dados['viagemClasse'] == 'Classe Executiva') echo 'selected'; ?>>Classe Executiva</option>>
        </select>
        <br>

        <label class="mb-5 p-3"> TIPO - VIAGEM <br></label>
        <select name="tipo" disabled id="slect" class="p-3 mt-1 w-25 text-center">
            <option value="Ida"  <?php if ($dados['viagemTipo'] == 'Ida') echo 'selected'; ?>>Ida</option>
            <option value="Ida e Volta"  <?php if ($dados['viagemTipo'] == 'Ida e Volta') echo 'selected'; ?>>Ida - Volta</option>>
        </select>
        <br>

        <?php

            $sql = "SELECT * from destinos";
            $resulta = mysqli_query($con, $sql);

        ?>


        <label class="mb-5 p-3 "> DESTINO <br></label>
        <select name="destino" disabled id="slect" class="p-3 mt-1 w-25 text-center">
            <?php
            while ($dadosD = mysqli_fetch_array($resulta)) { 
                $selected = ($dadosD['destinoNome'] == $escolhaAnterior) ? 'selected' : '';
                echo '<option ' . $selected . '>' . $dadosD['destinoNome'] . '</option>';
            }
            ?>
        </select>
        <br>
        <?php

        $sql = "SELECT * from companhias";
        $resulte = mysqli_query($con, $sql);

        ?>
        <label class="mb-5 p-3 "> COMPANHIA <br></label>
        <select name="companhia" disabled id="slect" class="p-3 mt-1 w-25 text-center">
            <?php
            while ($dadosC = mysqli_fetch_array($resulte)) { 
                $selected = ($dadosC['companhiaNome'] == $escolhaAnteriorComp) ? 'selected' : '';
                echo '<option ' . $selected . '>' . $dadosC['companhiaNome'] . '</option>';
            }
            ?>  
        </select>
        <div class="mb-3">
                <input type="text" hidden name="num" value=<?php echo $id ?>>
            <input type="button" class="btn btn-danger p-3 mt-3" id="confirmaVia" value="CONFIRMAR">
        </div>
    </form>
</div>


<?php
drawBottomBO()
    ?>