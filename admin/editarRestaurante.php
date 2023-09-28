<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

$id = intval($_POST['id']);
$escolhaAnterior = isset($_POST['destino']) ? mysqli_real_escape_string($con, $_POST['destino']) : '';



$sql = "SELECT * from restaurantes inner join concelhos on concelhoId=restauranteConcelhoId where restauranteId=$id ";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);
?>
<div class="w-75 p-5 m-5">
        <h1>Editar Restaurante</h1>
        <form class="p-5 mt-5" action="confirmarEditarRestaurante.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeDestino" class="form-label labelNome">NOME</label>
                <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $dados['restauranteNome'] ?>">
            </div>
            <div class="mb-3">
                <label for="DescricaoDestino" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="inputDesc" name="descricao"><?php echo $dados['restauranteDescricao'] ?></textarea>
            </div>

            
            <div class="mb-3">
                <label for="email" class="form-label">TELEFONE</label>
                <input type="tel" class="form-control" id="inputTel" name="telefone"  value="<?php echo $dados['restauranteTelefone'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">PREÇO</label>
                <input type="number" class="form-control" id="inputPreco" name="preco" placeholder="Preço por Pessoa"  value="<?php echo $dados['restaurantePreco'] ?>">
            </div>


            <div id="image">
                <label id="">RESTAURANTE - IMAGEM</label><br>
                <input type="file" class="mb-3" name="image" id="img" onchange="verificar()"  value="<?php echo $dados['restauranteImagemURL'] ?>"><br>
                <img  src="<?php echo $dados['restauranteImagemURL'] ?>" alt="" id="ima" width="200px" height="200px" class="mb-3">
                    
                </div>
            <?php
                $sql = "SELECT * FROM concelhos";
                $resultado = mysqli_query($con, $sql);
            ?>
                <label class="mb-5 p-2"> LOCALIZAÇÃO <br></label>
                        <select name="destino" id="slect" class="p-3 mt-1">
                <?php 
                    while ($dadosC = mysqli_fetch_array($resultado)) {
                        $selected = ($dadosC['concelhoNome'] == $escolhaAnterior) ? 'selected' : '';
                        echo '<option ' . $selected . '>' . $dadosC['concelhoNome'] . '</option>';
                    }?>
                        </select>

            <div class="mb-3 mt-3">
                <input type="text" hidden name="imagem" value=<?php echo $dados['restauranteImagemURL'] ?>>
                <input type="text" hidden name="num" value=<?php echo $id ?>>
                <input type="button" class="btn btn-primary p-3" id="confirmaRes" value="CONFIRMAR">
            </div>
        </form>
    </div>

                    
<?php
drawBottomBO()
?>