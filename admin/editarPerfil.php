<?php 

    include_once ("../php/backOffice.php");
    global $con;
    navBar();
    styleEditar();
    drawTopBO();

    if($_SESSION['utilizadorCargo']!="Geral"){
        echo '<style>#cargo { visibility: hidden; }</style>';
        echo '<style>#slect { visibility: hidden; }</style>';
    }

    if($_SESSION['utilizadorCargo']=="Utilizador"){
        
      echo '<style>#navBarRight { visibility: hidden; }</style>';
      echo '<style>#formulario { margin-left: 222px;    margin-right: -167px; }</style>';
      echo '<style>#titulo { margin-left: 260px; }</style>';
    }
    
    ?>
        <h2 id="titulo" class="w-75">PÁGINA DE EDIÇÃO - UTILIZADOR</h2>

        <form action="confirmarEditarUtilizador.php" method="POST" enctype="multipart/form-data" id="formulario">

        <div id="n">
        <label id="nome">UTILIZADOR - NOME</label><br>
        <input type="text" id="inputNome" name="nome" value="<?php echo $_SESSION['utilizadorNome'] ?>" class="text-center">
        </div>

        <div id="mid">
        <label id="idade">UTILIZADOR - IDADE</label><br>
        <input type="text" id="inputIdade" name="idade" value="<?php echo $_SESSION['utilizadorIdade'] ?>" class="text-center">
        </div>
        
        <div id="t">
        <label id="telefone">UTILIZADOR - TELEFONE</label><br>
        <input type="text" id="inputTelefone" name="telefone" value="<?php echo $_SESSION['utilizadorTelefone'] ?>" class="text-center">
        </div>

        <div id="n">
        <label id="email">UTILIZADOR - EMAIL</label><br>
        <input type="text" id="inputEmail" name="email" value="<?php echo $_SESSION['utilizadorEmail'] ?>" class="text-center">
        </div>

        <div id="mid">
        <label id="cargo">UTILIZADOR - CARGO</label><br>
                <select name="cargo" id="slect" value="<?php echo $_SESSION['utilizadorCargo'] ?>">
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
        <input type="file" name="image" id="img" onchange="verificar()" value="<?php echo $_SESSION['utilizadorImagemURL'] ?>">
        <img src="../admin/<?php echo $_SESSION['utilizadorImagemURL'] ?>" alt="50" srcset="" id="ima">
            
        </div>

        <input type="button" id="fimEdi" value="TERMINAR EDIÇÃO" class="w-75">
        </form>

<?php


drawBottomBO()


?>
