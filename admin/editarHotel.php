<?php
include_once("../php/backOffice.php");
global $con;

$id=intval($_POST['id']);
$escolhaAnterior = isset($_POST['destino']) ? mysqli_real_escape_string($con, $_POST['destino']) : '';

indexBO();
navBar();
drawTopBO();
$sql="select * from hoteis where hotelId='$id'";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>
<div class="w-75 p-5 m-5">
        <h1>Editar Hotel</h1>
        <form class="p-5 mt-5" action="confirmarEditarHotel.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeHotel" class="form-label labelNome">NOME</label>
                <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $dados['hotelNome'] ?>">
            </div>
            <div class="mb-3">
                <label for="descH" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="inputDesc" name="descricao"><?php echo $dados['hotelDescricao'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $dados['hotelEmail'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">TELEFONE</label>
                <input type="tel" class="form-control" id="inputTel" name="telefone" value="<?php echo $dados['hotelTelefone'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">PREÇO - POR NOITE</label>
                <input type="number" class="form-control" id="inputPreco" name="preco" value="<?php echo $dados['hotelPreco']?>">
            </div>

            <div id="image">
            <label id="">HOTEL - IMAGEM</label><br>
            <input type="file" class="mb-3" name="imagem" id="img" onchange="verificar()" value="<?php echo $dados['hotelImagemURL'] ?>"><br>
            <img  src="<?php echo $dados['hotelImagemURL'] ?>" id="ima" width="200px" height="200px" class="mb-3">
                
            </div>

            <label class="mb-5 p-2"> LOCALIZAÇÃO <br>
                <select name="destino" id="slect" class="p-3 mb-5 mt-2 w-100">
        <?php 

        $sql = "SELECT * FROM concelhos";
        $resultado = mysqli_query($con, $sql);

        while ($dadosC = mysqli_fetch_array($resultado)) {
            $selected = ($dadosC['concelhoNome'] == $escolhaAnterior) ? 'selected' : '';
            echo '<option ' . $selected . '>' . $dadosC['concelhoNome'] . '</option>';
        }
        ?>
    </select>

            <div class="mb-3">
                <input type="text" hidden name="imagem" value=<?php echo $dados['hotelImagemURL'] ?>>
                <input type="text" hidden name="num" value=<?php echo $id ?>>
                <input type="button" class="btn btn-primary p-3"  id="confirma" value="CONFIRMAR">
            </div>
        </form>
    </div>

    
<?php
drawBottomBO()
?>