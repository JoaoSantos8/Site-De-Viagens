<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();


$id = intval($_POST['id']);
$viagem = isset($_POST['viagem']) ? mysqli_real_escape_string($con, $_POST['viagem']) : '';
$hotel = isset($_POST['hotel']) ? mysqli_real_escape_string($con, $_POST['hotel']) : '';


$sql = "SELECT * from pacotes where pacoteId='$id'";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);
?>


<div class="w-75 p-5 m-5">
    <h1>Edita Pacote</h1>
    <form class="p-5 mt-5" action="confirmarEliminarPacote.php" method="post" enctype="multipart/form-data" id="formulario">

        <div class="mb-3 p-3">
            <label for="nomePacote" disabled class="form-label labelNome">NOME - PACOTE</label>
            <input type="text" class="form-control" id="inputTel" name="nome" value="<?php  echo $dados['pacoteNome'] ?>">
        </div>

        <?php

            $sql = "SELECT * from viagens INNER JOIN destinos on destinoId=viagemDestinoId";
            $resulta = mysqli_query($con, $sql);

             
            $sql = "SELECT * from viagens WHERE viagemId={$dados['pacoteViagemId']}";
            $resultad = mysqli_query($con, $sql);
            $dadosVia= mysqli_fetch_array($resultad);

?>


        <label class="mb-5 p-3 "> DESTINO - VIAGEM <br></label>
        <select name="viagem" disabled id="slect" class="p-3 mt-1 w-50 text-center">
            <?php
            while ($dadosD = mysqli_fetch_array($resulta)) { 
                $selected = ($dadosD['destinoNome'] == $viagem) ? 'selected' : '';
                echo '<option value="' . $dadosVia['viagemPreco'] . '" ' . $selected . '>|   Destino ' . $dadosD['destinoNome'] . '   |   Preço ' . $dadosD['viagemPreco'] . '€   |   Data ' . date('d/m/Y', strtotime($dados['viagemData'])) . "   |" . '</option>';
}

            ?>
        </select>
        <br>
        <?php

        $sql = "SELECT * from hoteis INNER JOIN concelhos on concelhoId=hoteisConcelhoId";
        $resulte = mysqli_query($con, $sql);

        ?>
        <label class="mb-5 p-3 "> HOTEL <br></label>
        <select name="hotel" id="slecte" disabled class="p-3 mt-1 w-50 text-center">
            <?php
            while ($dadosC = mysqli_fetch_array($resulte)) { 
                $selected = ($dadosC['hotelNome'] == $hotel) ? 'selected' : '';
                echo '<option value="' . $dadosC['hotelPreco'] . '" ' . $selected . '>| Nome ' . $dadosC['hotelNome'] . ' | Localização ' . $dadosC['concelhoNome'] . ' | Preço ' . $dadosC['hotelPreco'] . '€ | </option>';
            }
            ?>  
        </select>

        <br>PREÇO PROVISÓRIO:<label id="opcaoSelecionada" class="p-3"> </label>

        <div class="mb-3">
                <input type="text" hidden name="num" value=<?php echo $id ?>>
            <input type="button" class="btn btn-danger p-3 mt-3" id="confirmaP" value="CONFIRMAR">
        </div>
    </form>
</div>


<?php
drawBottomBO()
    ?>