<?php
include_once("../php/backOffice.php");
global $con;

$id = intval($_POST['id']);
$escolhaAnterior = isset($_POST['destino']) ? mysqli_real_escape_string($con, $_POST['destino']) : '';

indexBO();
navBar();
drawTopBO();
$sql = "SELECT * FROM eventos WHERE eventoId='$id'";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);
?>

<div class="w-75 p-5 m-5">
    <h1>Editar Hotel</h1>
    <form class="p-5 mt-5" action="confirmarEliminarEvento.php" method="post" enctype="multipart/form-data"
        id="formulario">
        <div class="mb-3 p-3">
            <label for="nomeHotel" class="form-label labelNome">NOME</label>
            <input disabled  type="text" class="form-control" id="inputNome" name="nome"
                value="<?php echo $dados['eventoNome'] ?>">
        </div>
        <div class="mb-3 p-3">
            <label for="descH" class="form-label">DESCRIÇÃO</label>
            <textarea class="form-control" id="inputDesc"
            disabled name="descricao"><?php echo $dados['eventoDescricao'] ?></textarea>
        </div>
        <div class="mb-3 p-3">
            <label for="email" class="form-label">EMAIL</label>
            <input type="email" class="form-control" id="inputEmail" name="email"
            disabled value="<?php echo $dados['eventoEmail'] ?>">
        </div>
        <div class="mb-3 w-50 float-left p-3">
            <label for="data" class="form-label">DATA - COMEÇO</label>
            <input type="date" class="form-control" disabled  id="inputDataC" name="dataC" value="<?php echo $dados['eventoDataC'] ?>">
        </div>
        <div class="mb-3 w-50 float-right p-3">
            <label for="data" class="form-label">DATA - TERMINA</label>
            <input type="date" class="form-control"  disabled id="inputDataA" name="dataA" value="<?php echo $dados['eventoDataA'] ?>">
        </div>
        <div class="mb-3 p-3">
            <label for="preco" class="form-label">PREÇO - POR NOITE</label>
            <input type="number"  disabled class="form-control" id="inputPreco" name="preco"
                value="<?php echo $dados['eventoPreco'] ?>">
        </div>

        <div id="image" class="p-3">
            <label id="">HOTEL - IMAGEM</label><br>
            <input type="file" disabled  class="mb-3" name="imagem" id="img" onchange="verificar()"
                value="<?php echo $dados['eventoImagemURL'] ?>"><br>
            <img src="<?php echo $dados['eventoImagemURL'] ?>" id="ima" width="200px" height="200px" class="mb-3">

        </div>
        <label class="mb-5 p-3"> TIPO - EVENTO <br></label>
    <select name="tipo" id="slect"  disabled class="p-3 mb-5 mt-2 w-25">
        <option value="Noite" <?php if ($dados['eventoTipo'] == 'Noite') echo 'selected'; ?>>Noite</option>
        <option value="Dia" <?php if ($dados['eventoTipo'] == 'Dia') echo 'selected'; ?>>Dia</option>
        <option value="Festival" <?php if ($dados['eventoTipo'] == 'Festival') echo 'selected'; ?>>Festival</option>
        <option value="Festa" <?php if ($dados['eventoTipo'] == 'Festa') echo 'selected'; ?>>Festa</option>
        <option value="Feira" <?php if ($dados['eventoTipo'] == 'Feira') echo 'selected'; ?>>Feira</option>
    </select><br>
        <label class="mb-5 p-3"> LOCALIZAÇÃO <br></label>
            <select name="destino" id="slect"  disabled class="p-3 mb-5 mt-2 w-25">
                <?php

                $sql = "SELECT * FROM concelhos";
                $resultado = mysqli_query($con, $sql);

                while ($dadosC = mysqli_fetch_array($resultado)) {
                    $selected = ($dadosC['concelhoNome'] == $escolhaAnterior) ? 'selected' : '';
                    echo '<option ' . $selected . '>' . $dadosC['concelhoNome'] . '</option>';
                }
                ?>
            </select>

            <div class="mb-3  p-3">
                <input type="text" hidden name="imagem" value=<?php echo $dados['eventoImagemURL'] ?>>
                <input type="text" hidden name="num" value=<?php echo $id ?>>
                <input type="submit" class="btn btn-danger p-3" id="" value="CONFIRMAR">
            </div>
    </form>
</div>


<?php
drawBottomBO()
    ?>