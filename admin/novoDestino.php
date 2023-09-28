<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();
?>
<div class="w-75 p-5 m-5">
        <h1>Novo Concelho</h1>
        <form class="p-5 mt-5" action="confirmaNovoDestino.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeDestino" class="form-label labelNome">NOME</label>
                <input type="text" class="form-control" id="inputNome" name="nome">
            </div>
            <div class="mb-3">
                <label for="DescricaoDestino" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="inputDesc" name="descricao"></textarea>
            </div>

            <div id="image">
        <label id="">DESTINO - IMAGEM</label><br>
        <input type="file" class="mb-3" name="image" id="img" onchange="verificar()"><br>
        <img  alt="" id="ima" width="200px" height="200px" class="mb-3">
            
        </div>

            <div class="mb-3">
                <input type="button" class="btn btn-primary p-3" id="confirmaD" value="CONFIRMAR">
            </div>
        </form>
    </div>

    
<?php
drawBottomBO()
?>