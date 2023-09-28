<?php 

    include_once ("../php/backOffice.php");
    global $con;
    
    $id=intval($_POST['id']);
    navBar();
    styleEditar();
    drawTopBO();
    $sql="select * from utilizadores where utilizadorId='$id'";
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    ?>
        <h2 id="titulo" class="w-75">PÁGINA DE EDIÇÃO - UTILIZADOR</h2>

        <form action="confirmarEditaUtilizador.php" method="POST" enctype="multipart/form-data">

        <div id="n">
        <label id="nome">UTILIZADOR - NOME</label><br>
        <input type="text" id="inputNome" name="nome" value="<?php echo $dados['utilizadorNome'] ?>" class="text-center">
        </div>

        <div id="mid">
        <label id="idade">UTILIZADOR - IDADE</label><br>
        <input type="text" id="inputIdade" name="idade" value="<?php echo $dados['utilizadorIdade'] ?>" class="text-center">
        </div>
        
        <div id="t">
        <label id="telefone">UTILIZADOR - TELEFONE</label><br>
        <input type="text" id="inputTelefone" name="telefone" value="<?php echo $dados['utilizadorTelefone'] ?>" class="text-center">
        </div>

        <div id="n">
        <label id="email">UTILIZADOR - EMAIL</label><br>
        <input type="text" id="inputEmail" name="email" value="<?php echo $dados['utilizadorEmail'] ?>" class="text-center">
        </div>

        <div id="mid">
        <label id="cargo">UTILIZADOR - CARGO</label><br>
                <select name="cargo" id="slect" value="<?php echo $dados['utilizadorCargo'] ?>">
                    <option id="dif" value="dif" selected disabled>Cargo</option>
                    <option value="Geral">Geral</option>
                    <option value="Monumentos">Monumentos</option>
                    <option value="Restaurantes">Restaurantes</option>
                    <option value="Hoteis">Hotéis</option>
                    <option value="Viagens">Viagens</option>
                    <option value="Atividades">Atividades</option>
                    <option value="Utilizador">Utilizador</option>
                </select>
        </div>

        <div id="image">
        <label id="imagem">UTILIZADOR - IMAGEM</label><br>
        <div id="inputImagem">Selecione Sua Imagem</div>    
        <input type="file" name="image" id="img" onchange="verificar()" value="<?php echo $dados['utilizadorImagemURL'] ?>">
        <img src="<?php echo $dados['utilizadorImagemURL'] ?>" alt="50" srcset="" id="ima">
            
        </div>

        <input type="text" hidden name="num" value=<?php echo $id ?>>
        <input type="text" hidden name="imagem" value=<?php echo $dados['utilizadorImagemURL'] ?>>
        <input type="button" id="fimEdi" value="TERMINAR EDIÇÃO" class="w-75">
        </form>

<?php


drawBottomBO()


?>
