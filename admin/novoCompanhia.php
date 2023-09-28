<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();
?>
<div class="w-75 p-5 m-5">
        <h1>Nova Companhia</h1>
        <form class="p-5 mt-5" action="confirmaNovoCompanhia.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeDestino" class="form-label labelNome">NOME</label>
                <input type="text" class="form-control" id="inputNome" name="nome">
            </div>

            <div class="mb-3">
                <label for="DescricaoDestino" class="form-label">Telefone</label>
                <textarea class="form-control" id="inputTel" name="telefone"></textarea>
            </div>

            <div class="mb-3">
                <input type="button" class="btn btn-primary p-3" id="confirmaComp" value="CONFIRMAR">
            </div>
        </form>
    </div>

    
<?php
drawBottomBO()
?>