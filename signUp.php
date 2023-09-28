<?php 
include_once ("php/frontOffice.php");
global $con;

if (isset($_GET['erro'])) {
    $tipoErro = $_GET['erro'];
    
    if ($tipoErro === 'email_repetido') {
        echo "<script>alert('O utilizador já está registado');</script>";
        
    }
    // Adicione outros tipos de erro aqui, se necessário
}


drawTopFO();
navBarTopFO();
?>


    <form action="admin/confirmaNovoUtilizador.php" method="post" id="cardSignUp" enctype="multipart/form-data">
        <div id="card"></div>
        <div id="insDados">

        <h2 id="tDados" class="text-center p-2">SIGN UP</h2>


        <div id="primeiraEtapa" class="mx-auto">
        <label id="nome" for="inputNome" class="text-center">NOME</label><input type="text" name="nome" placeholder="Escreva Seu Nome" id="inputNome" class="" required>
        <label id="email" for="inputEmail" class="text-center">EMAIL</label><input type="email" name="email" placeholder="Escreva Seu Email" id="inputEmail" class="" required>
        <label id="idade" for="inputIdade" class="text-center">IDADE</label><input type="number" name="idade" placeholder="Selecione Sua Idade" id="inputIdade" class="" required>
        <label id="telefone" for="inputTelefone" class="text-center">TELEFONE</label><input type="tel" name="telefone" placeholder="Número De Telefone" id="inputTelefone" class="" required>
        </div>


        <div id="segundaEtapa">


        <div id="imagemSel" class="mt-5 mb-5">
            <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )" >Adicionar Imagem</button>
            
                <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' onchange="lerImagem(this);"  name="image" accept="image/*" />
                <div class="drag-text">
                    <h3>Desloque até aqui a sua imagem</h3>
                </div>
                </div>
                <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title" id="imgTitle">Sua Imagem</span></button>
                </div>
                </div>
            </div>
        </div>


            <div class="sel sel--black-panther" id="slect">
                <select name="cargo" id="select-profession">
                    <option id="default" value="dif" selected>Cargo</option>
                    <option value="geral">Geral</option>
                    <option value="monumentos">Monumentos</option>
                    <option value="restaurantes">Restaurantes</option>
                    <option value="hoteis">Hotéis</option>
                    <option value="viagens">Viagens</option>
                    <option value="atividades">Atividades</option>
                    <option value="Utilizador">Utilizador</option>
                </select>
            </div>
        

        </div>


        <div id="terceiraEtapa">
        <label id="pass" for="inputPass" class="text-center">PALAVRA - CHAVE</label><input type="password" name="pass" placeholder="Escreva Sua Password" id="inputPass" class="" required>
        <label id="cPass" for="inputCPass" class="text-center">CONFIRME A CHAVE</label><input type="password" name="passConfirm" placeholder="Confirme Sua Chave" id="inputCPass" class="" required>
        </div>


        <div id="paginas" class="text-center"><div id="p1">1</div><div id="p2">2</div><div id="p3">3</div></div>
        <input type="button" id="next1" value="PRÓXIMO" class="text-center p-2">
        

        <input readonly value="1" id="identificador" hidden>  
    </div>
    </form>




<?php
drawBottomFO();
?>