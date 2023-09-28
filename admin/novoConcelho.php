<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

$sql = "select * from destinos ";
$result = mysqli_query($con, $sql);
?>
<div class="w-75 p-5 m-5">
        <h1>Novo Distrito</h1>
        <form class="p-5 mt-5" action="confirmaNovoConcelho.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeDestino" class="form-label labelNome">NOME</label>
                <input type="text" class="form-control" id="inputNome" name="nome">
            </div>
            <div class="mb-3">
                <label for="DescricaoDestino" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="inputDesc" name="descricao"></textarea>
            </div>

            <div id="image">
                <label id="">DISTRITO - IMAGEM</label><br>
                <input type="file" class="mb-3" name="image" id="img" onchange="verificar()"><br>
                <img  alt="" id="ima" width="200px" height="200px" class="mb-3">
                    
                </div>
            
                <label class="mb-5 p-2"> DESTINOS <br></label>
                        <select name="destino" id="slect" class="p-3 mt-1">
                <?php 
                    while ($dados = mysqli_fetch_array($result)) {?>
                            <option><?php echo $dados['destinoNome'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

            <div class="mb-3 mt-5">
                <input type="button" class="btn btn-primary p-3" id="confirmaD" value="CONFIRMAR">
            </div>
        </form>
    </div>

                    
<?php
drawBottomBO()
?>