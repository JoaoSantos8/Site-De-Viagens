<?php
include_once("config.inc.php");
$con = mysqli_connect(HOST, USER, PWD, DATABASE);
$con->set_charset('UTF-8');
require("../php/sessaoBO.php");
sessao();
sessaoUti();
?>
<?php

function drawTopBO()
{

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../images/logoPe.ico">
    <title>E U R O - T R I P </title>
  </head>

  <body>
    <nav id="navBarRight">
      <h2 class="p-3 text-center">Menu</h2>
      <?php
      if ($_SESSION['utilizadorCargo'] == "Monumentos") {
        ?>
        <a href="../admin/listaMonumentos.php">
          <div class="text-center mt-4" id="monumentos">Monumentos</div>
        </a>
        <?php
        destinos();
      }

      if ($_SESSION['utilizadorCargo'] == "Restaurantes") {
        ?>

        <a href="../admin/listaRestaurantes.php">
          <div class="text-center mt-4" id="restaurantes">Restaurantes</div>
        </a>
        <?php
        destinos();
      }

      if ($_SESSION['utilizadorCargo'] == "Geral") {
        ?>


        <a href="../admin/listaUtilizadores.php">
          <div class="text-center mt-4" id="utilizadores">Utilizadores</div>
        </a>
        <a href="../admin/listaMonumentos.php">
          <div class="text-center mt-4" id="monumentos">Monumentos</div>
        </a>
        <a href="../admin/listaRestaurantes.php">
          <div class="text-center mt-4" id="restaurantes">Restaurantes</div>
        </a>
        <?php
        destinos();
      }

      if ($_SESSION['utilizadorCargo'] == "Hoteis") {

        destinos();

      }
      if ($_SESSION['utilizadorCargo'] == "Atividades") {

        destinos();

      }
      if ($_SESSION['utilizadorCargo'] == "Viagens") {
        destinos();
      }
      ?>



      <a href="#">
        <div class="text-center mt-4 dropdown-toggle" id="perfilUnico">
          <?php echo $_SESSION['utilizadorNome'] ?>
        </div>
      </a>


      <a href="editarPerfil.php">
        <div class="text-center mt-4" id="EP">Editar Perfil</div>
      </a>
      <a href="/Site/admin/logout.php">
        <div class="text-center mt-4" id="TS">Terminar Sessão</div>
      </a>

      <a href="#" onclick="history.go(-1)/*Também Podia ser history.back()*/">
        <div class="text-center mt-4" id="voltar"></div>
      </a>

      <a href="../admin/index.php" id="pp">
        <div class="text-center mt-4"></div>
      </a>
    </nav>
    <?php
}

function destinos()
{
  ?>
    <a href="listaDestinos.php">
      <div class="text-center mt-4" id="paises">Concelhos</div>
    </a>
    <a href="listaConcelhos.php">
      <div class="text-center mt-4" id="concelhos">Distritos</div>
    </a>

    <?php
}

function navBarBO()
{ ?>



    <div id="perfil">
      <img src="../admin/<?php echo $_SESSION['utilizadorImagemURL'] ?>" id="imgPerfil">
      <h2 id="titulo" class="text-center mt-4">SEU PERFIL</h2>


      <div id="dadosLeft">
        <div id="n" class="text-center">NOME</div>
        <div id="nome" class="text-center">
          <?php echo $_SESSION['utilizadorNome'] ?>
        </div>
        <div id="n" class="text-center">EMAIL</div>
        <div id="email" class="text-center">
          <?php echo $_SESSION['utilizadorEmail'] ?>
        </div><br>
      </div>


      <div id="dadosMiddle">
        <div id="n" class="text-center">IDADE</div>
        <div id="idade" class="text-center">
          <?php echo $_SESSION['utilizadorIdade'] ?>
        </div>
        <div id="n" class="text-center">TELEFONE</div>
        <div id="telefone" class="text-center">
          <?php echo $_SESSION['utilizadorTelefone'] ?>
        </div><br>

      </div>

      <div id="dadosRight">
        <div id="n" class="text-center">CARGO</div>
        <div id="cargo" class="text-center align-middle">
          <?php echo $_SESSION['utilizadorCargo'] ?>
        </div>
      </div>
    </div>

    <div id="cabeca">
    <a href="../paginaPrincipal.php" class="btn btn-success w-100" id="cabecaButton">PÁGINA PRÍNCIPAL</a>
    </div>  
    <?php

    if ($_SESSION['utilizadorCargo'] == "Geral") {
      ?>
      <div id="btnsCima">
        <a href="../admin/listaViagens.php" class="link-styled">
          <div id="btn1">
          </div>
        </a>

        <a href="../admin/listaHoteis.php" class="link-styled">
          <div id="btn2">
          </div>
        </a>
      </div>

      <div id="btnsBaixo"><a href="../admin/listaPacotes.php" class="link-styled">
          <div id="btn3">
          </div>
        </a>
        <a href="../admin/listaEventos.php" class="link-styled">
          <div id="btn4">
          </div>
        </a>
      </div>

      <?php
    }

    if ($_SESSION['utilizadorCargo'] == "Viagens") {
      ?>
      <div id="btnsCima"><a href="../admin/listaViagens.php" class="link-styled">
          <div id="btn1">
          </div>
        </a>
        <a href="../admin/listaPacotes.php" class="link-styled">
          <div id="btn3">
          </div>
        </a>
      </div>

      <?php
    }

    if ($_SESSION['utilizadorCargo'] == "Hoteis") {
      ?>
      <div id="btnsCima">
        <a href="../admin/listaHoteis.php" class="link-styled">
          <div id="btn4" style="margin-left: 28%">
          </div>
        </a>

      </div>

      <?php
    }

    if ($_SESSION['utilizadorCargo'] == "Atividades") {
      ?>
      <div id="btnsCima">
        <a href="../admin/listaEventos.php" class="link-styled">
          <div id="btn4" style="margin-left: 28%">
          </div>
        </a>

      </div>

      <?php
    }

    if ($_SESSION['utilizadorCargo'] == "Utilizador") {
      exit;
    }
    ?>

    <?php
}

function drawBottomBO()
{
  ?>
  </body>
  <script src="../admin/js/java.js"></script>
  <script src="../js/java.js"></script>

  </html>

  <?php
}

function indexBO()
{
  ?>
  <link rel="stylesheet" href="../admin/css/indexBO.css">
  <?php
}

function styleEditar()
{
  ?>

  <link rel="stylesheet" href="../admin/css/styleEditar.css">

  <?php
}


function navBar()
{
  ?>

  <link rel="stylesheet" href="../admin/css/navBar.css">

  <?php
}
?>