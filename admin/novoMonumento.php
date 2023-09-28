<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

$sql = "select * from concelhos";
$result = mysqli_query($con, $sql);
?>
<div class="w-75 p-5 m-5">
        <h1>Novo Monumento</h1>
        <form class="p-5 mt-5" action="confirmaNovoMonumento.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeHotel" class="form-label labelNome">NOME</label>
                <input type="text" class="form-control" id="inputNome" name="nome">
            </div>
            <div class="mb-3">
                <label for="descH" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="inputDesc" name="descricao"></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" class="form-control" id="inputEmail" name="email">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">TELEFONE</label>
                <input type="tel" class="form-control" id="inputTel" name="telefone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">PREÇO - BILHETE</label>
                <input type="number" class="form-control" id="inputPreco" name="preco" placeholder="Preço">
            </div>

            <div id="image">
            <label id="">HOTEL - IMAGEM</label><br>
            <input type="file" class="mb-3" name="image" id="img" onchange="verificar()"><br>
            <img  alt="" id="ima" width="200px" height="200px" class="mb-3">
                
            </div>

            <label class="mb-5 p-2"> LOCALIZAÇÃO <br></label>
                        <select name="destino" id="slect" class="p-3 mt-1">
                <?php 
                    while ($dados = mysqli_fetch_array($result)) {?>
                            <option><?php echo $dados['concelhoNome'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

            <div class="mb-3">
                <input type="button" class="btn btn-primary p-3 mt-3" id="confirma" value="CONFIRMAR">
            </div>
        </form>
    </div>

    
<?php
drawBottomBO()
?>