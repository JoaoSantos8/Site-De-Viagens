<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

$sql = "select * from eventos";
$result = mysqli_query($con, $sql);
?>
<div class="w-75 p-5 m-5">
    <h1>Nova Atividade</h1>
    <form class="p-5 mt-5" action="confirmaNovoAtividade.php" method="post" enctype="multipart/form-data" id="formulario">
        <div class="mb-3">
            <label for="nomeHotel" class="form-label labelNome">NOME</label>
            <input type="text" class="form-control" id="inputNome" name="nome">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">PREÇO</label>
            <input type="number" class="form-control" id="inputPreco" name="preco" placeholder="Preço por Bilhete/Ficha">
        </div>

        <div id="image">
            <label id="">ATIVIDADE - IMAGEM</label><br>
            <input type="file" class="mb-3" name="image" id="img" onchange="verificar()"><br>
            <img alt="" id="ima" width="200px" height="200px" class="mb-3">

        </div>
        
        <label class="mb-5 p-2 "> LOCALIZAÇÃO <br></label>
        <select name="evento" id="slect" class="p-3 mt-1">
            <?php
            while ($dados = mysqli_fetch_array($result)) { ?>
                <option>
                    <?php echo $dados['eventoNome'] ?>
                </option>
                <?php
            }
            ?>
        </select>

        <div class="mb-3">
            <input type="button" class="btn btn-primary p-3 mt-3" id="confirmaAtiv" value="CONFIRMAR">
        </div>
    </form>
</div>


<?php
drawBottomBO()
    ?>