<?php
include_once("config.inc.php");
$con = mysqli_connect(HOST, USER, PWD, DATABASE);
$con->set_charset('UTF-8');

$_SESSION = [];

if (isset($_SESSION['utilizadorId'])) {
  include_once("sessaoBO.php");
  sessao();
  sessaoUti();
}
?>
<?php

function menuNavBar()
{
  ?>

  <div id="opcoes">
            <?php if (isset($_SESSION['utilizadorId'])) { ?>
                  <a href="#" style="color: black !important;" class="w-100" id="link">
                  <img src="admin/<?php echo $_SESSION["utilizadorImagemURL"] ?>" id="imgP">
                    <div class="text-center mx-auto p-3 dropdown-toggle" id="perfilUti">
                      <?php echo $_SESSION["utilizadorNome"] ?>
                    </div>
                  </a>

                  <div id="menuPerfil" class="dropdown-menu">
                    <?php if ($_SESSION['utilizadorCargo'] != "Utilizador") { ?>
                          <a class="dropdown-item p-3 text-center" href="admin/index.php" style="color: black; font-weight: bold; letter-spacing: 2px; text-transform:uppercase;">Gestão</a>
                    <?php } ?>
                    <a class="dropdown-item p-3 text-center" href="admin/editarPerfil.php"
                    id="itemDrop">Perfil</a>
                  <a class="dropdown-item p-3 text-center" href="carrinho.php" id="itemDrop">Carrinho</a>
                    <a class="dropdown-item p-3 text-center" href="admin/logout.php"
                      id="itemDrop">Terminar Sessão</a>

                  </div>

            <?php } else { ?>
                  <a href="signUp.php" style="color: black !important;" class="w-50">
                    <div class="text-center mx-auto p-3" id="signUp">Criar Conta</div>
                  </a>
                  <a href="login.php" style="color: black !important;" class="w-50">
                    <div class="text-center mx-auto p-3" id="login">Login</div>
                  </a>
            <?php } ?>
          </div>

  <?php
}


function drawTopFO()
{
  ?>

      <!DOCTYPE html>
      <html lang="pt">

      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jacques+Francois+Shadow&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     
        <link rel="icon" type="image/x-icon" href="images/logoPe.ico">

        <link rel="stylesheet" href="css/styleFO.css">
        <title> E U R O - T R I P</title>
      </head>

      <body>

        <?php
}


function botao($id, $nome, $preco)
{
  ?>
      <form action="../SiteViagens/confirmarProdutoHotel.php" method="post" id="formHotel">
        
          </div>
          <div id="quanti">
                  <label for="inputQuanti" id="labelQuanti">Quantas Noites pretende ficar?</label>
                  <input type="number" id="inputQuanti" name="quantidade">
              </div>
              <?php
              //$_SESSION['precoTotal']=0;
              ?>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nomeProduto" value="<?php echo $nome; ?>">
            <input type="hidden" name="preco" value="<?php echo $preco; ?>">
            <button type="button" class="btn btn-success" id="btnH">Confirmar</button>

            <script>

           

            </script>

    </form>

    <?php
}

function botaoViagens($id, $nome, $preco)
{
  ?>
          <form action="../SiteViagens/confirmarProdutoViagem.php" method="post" id="formViagens">
          <?php
          global $con;
          $sql = "SELECT * FROM viagens INNER JOIN destinos ON viagemDestinoId = destinoId WHERE viagemId='$id'";
          $result = mysqli_query($con, $sql);
          $dados = mysqli_fetch_array($result);
          ?>
          </div>
          <div id="quantiV" style="margin-top: -6%;">
                  <label for="inputQuantiV" id="labelQauntiV">Quantos Bilhetes Pretende?</label>
                  <input type="number" id="inputQuantiV" name="quantidade">
              </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nomeProduto" value="<?php echo $nome; ?>">
            <input type="hidden" name="preco" value="<?php echo $preco; ?>">
            <button type="button" class="btn btn-success" id="btnV" onclick="verificar(<?php echo $dados['viagemLugares'] ?>)">Confirmar</button>

            <script>

           

            </script>

    </form>

    <?php
}

function navBarTopFO()
{
  ?>
        <nav class="w-100" id="navBarTop">
          <a href="../SiteViagens/paginaPrincipal.php">
            <div id="logotipo"></div>
          </a>
          <label id="titulo">
            <font class="text-center">Página Príncipal</font>
          </label>
          <?php
          menuNavBar();
          ?>

        </nav>
        <?php
}

function navBarTop()
{
  ?>
        <nav class="w-100" id="navBarTop">
          <a href="../SiteViagens/index.php">
            <div id="logotipo"></div>
          </a>
          <label id="titulo">
            <font class="text-center">Página Príncipal</font>
          </label>


          <?php
          menuNavBar();
          ?>
        </nav>
        <?php
}

function navBarBottomFO()
{
  ?>
        <nav class="fixed-bottom w-75 mx-auto" id="navBarBottom">
          <div class="text-center navbar navbar-expand-lg navbar-dark align-middle" id="navBarB">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown" id="dropDownP">
                  <a class="nav-link dropdown-toggle text-light" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Pacotes
                  </a>
                  <div class="dropdown-menu" id="dropDownMenuP" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item p-3 text-center" href="../SiteViagens/viagens.php"
                      style="color: black; font-weight: bold;">Viagens</a>
                    <a class="dropdown-item p-3 text-center" href="../SiteViagens/hoteis.php"
                      style="color: black; font-weight: bold;">Hoteis</a>
                    <a class="dropdown-item p-3 text-center" href="../SiteViagens/pacotes.php"
                      style="color: black; font-weight: bold;">Pacotes</a>
                  </div>
                </li>

                <li class="nav-item dropdown" id="dropDownD">
                  <a class="nav-link dropdown-toggle text-light" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Destinos
                  </a>
                  <div class="dropdown-menu" id='dropDownMenuD' aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item p-3 text-center" href="paises.php"
                      style="color: black; font-weight: bold;">Paises</a>
                    <a class="dropdown-item p-3 text-center" href="concelhos.php" style="color: black; font-weight: bold;">Concelhos</a>
                  </div>
                </li>
                <li class="nav-item dropdown" id="dropDownA">
                  <a class="nav-link dropdown-toggle text-light" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Atividades
                  </a>
                  <div class="dropdown-menu" id='dropDownMenuA' aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item p-3 text-center" href="../SiteViagens/eventos.php?id=Festival"
                      style="color: black; font-weight: bold;">Festivais</a>
                    <a class="dropdown-item p-3 text-center dropdown" href="../SiteViagens/eventos.php?id=Dia"
                      style="color: black; font-weight: bold;">Durante o Dia</a>
                    <a class="dropdown-item p-3 text-center" href="../SiteViagens/eventos.php?id=Festa"
                      style="color: black; font-weight: bold;">Festas</a>
                    <a class="dropdown-item p-3 text-center" href="../SiteViagens/eventos.php?id=Noite"
                      style="color: black; font-weight: bold;">Noite</a>
                    <a class="dropdown-item p-3 text-center" href="" style="color: black; font-weight: bold;">Diversões</a>
                    <a class="dropdown-item p-3 text-center" href="../SiteViagens/eventos.php?id=Feira"
                      style="color: black; font-weight: bold;">Feira</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="../SiteViagens/monumentos.php">Monumentos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="../SiteViagens/restaurantes.php">Restaurantes</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <?php
}

function slidePacotes()
{

  global $con;


  $order = isset($_GET['order']) ? $_GET['order'] : '';

  /**********Atribui o valor a session*/
  if (!isset($_SESSION['filtro'])) {
    $_SESSION['filtro'] = isset($_GET['filtro']) ? $_GET['filtro'] : '';
  }
  /**********Atribui o valor guardado na session*/
  $filtro = $_SESSION['filtro'];


  /***************Para alterar se houver mudanças no que eu mudar nos filtros*****************/
  if (isset($_GET['filtro']) && $_GET['filtro'] !== $filtro) {
    $filtro = $_GET['filtro'];
    $_SESSION['filtro'] = $filtro;
  }


  if ($filtro === 'pacotes') {
    $sql = "SELECT * FROM pacotes INNER JOIN viagens ON pacoteViagemId = viagemId 
        INNER JOIN hoteis ON pacoteHotelId = hotelId";
    if ($order === 'DESC') {
      $sql .= " ORDER BY hotelPreco + viagemPreco DESC"; // Altere o campo conforme necessário
    } elseif ($order === 'CRESC') {
      $sql .= " ORDER BY hotelPreco + viagemPreco ASC"; // Altere o campo conforme necessário
    }
  } elseif ($filtro === 'viagens') {
    $sql = "SELECT * FROM viagens INNER JOIN companhias ON viagemCompanhiaId = companhiaId
        INNER JOIN destinos ON viagemDestinoId = destinoId";
    if ($order === 'DESC') {
      $sql .= " ORDER BY viagemPreco DESC"; // Altere o campo conforme necessário
    } elseif ($order === 'CRESC') {
      $sql .= " ORDER BY viagemPreco ASC"; // Altere o campo conforme necessário
    }
  } elseif ($filtro === 'hoteis') {
    $sql = "SELECT * FROM hoteis INNER JOIN concelhos ON hoteisConcelhoId = concelhoId";
    if ($order === 'DESC') {
      $sql .= " ORDER BY hotelPreco DESC"; // Altere o campo conforme necessário
    } elseif ($order === 'CRESC') {
      $sql .= " ORDER BY hotelPreco ASC"; // Altere o campo conforme necessário
    }
  } else {
    $sql = "SELECT * FROM pacotes INNER JOIN viagens ON pacoteViagemId = viagemId 
        INNER JOIN hoteis ON pacoteHotelId = hotelId";
  }
  $result = mysqli_query($con, $sql);
  ?>


        <form action="" method="GET" class="mt-5 w-50 float-left" id="ordenar">
          <div class="input-group ">
            <h5 class="mt-2 ml-2">Ordenação: </h5>
            <button type="submit" class="btn ml-3 mb-3 bOrd" name="order" value="DESC">Maior para Menor&nbsp;<img
                src="images/desc.png" width="20px" height="20px"></button>
            <button type="submit" class="btn ml-3 mb-3 bOrd" name="order" value="CRESC">Menor para Maior&nbsp;<img
                src="images/cresc.png" width="20px" height="20px"></button>
          </div>
        </form>
        <form action="" method="GET" class="mt-5 float-right" id="filtro">
          <div class="input-group">
            <h5 class="mt-2 ml-2">Filtros: </h5>
            <button type="submit" class="btn ml-3 mb-3 bOrd" name="filtro" value="pacotes">Pacotes</button>
            <button type="submit" class="btn ml-3 mb-3 bOrd" name="filtro" value="viagens">Viagens</button>
            <button type="submit" class="btn ml-3 mb-3 bOrd" name="filtro" value="hoteis">Hoteis</button>
          </div>
        </form>

        <h2 class="mt-5" id="titu">PACOTES</h2>
        <div id="slide">
        <div class="w-100 d-flex flex-wrap align-items-center" id="containerCima">

          <?php while ($dados = mysqli_fetch_array($result)) { ?>
                <?php if ($filtro === 'pacotes' || $filtro === "") {
                  $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemDestinoId']}";
                  $resultado = mysqli_query($con, $sql);
                  $dadosD = mysqli_fetch_array($resultado);
                  ?>
                      <div id="caixa">
                        <a href="pacote.php?id=<?php echo $dados['pacoteId'] ?>">
                          <h4 class="text-center mt-1 p-3 tituolo">
                            <?php echo $dados['pacoteNome'] ?>
                          </h4>
                          <img src="admin/<?php echo $dados['hotelImagemURL'] ?>" alt="" class="w-100" height="250px">

                          <div class="w-75 float-left text-center pt-4 info">
                            <div class="w-50 float-left">Destino:
                              <?php echo $dadosD['destinoNome'] ?>
                            </div>
                            <div class="w-50 float-right">
                              <?php echo $dados['hotelNome'] ?>
                            </div>
                          </div>

                          <div class="w-25 float-right preco">
                            <h4 class="text-center mt-1 p-3">
                              <?php echo $dados['hotelPreco'] + $dados['viagemPreco'] ?>€
                            </h4>
                          </div>

                        </a>
                      </div>
                <?php } elseif ($filtro === 'viagens') { ?>




                      <div id="caixa" class="w-50" style="max-height: 578px;">
                        <a href="viagens.php" style="color:black !important;">

                          <?php
                          $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemChegadaDestinoId']}";
                          $chegada = mysqli_query($con, $sql);
                          $chegadas = mysqli_fetch_array($chegada)
                            ?>

                          <div class="w-100 text-center" style="height:80px">

                            <h4 class="text-center p-3 float-left ml-2">De
                              <?php echo $dados['destinoNome'] ?>
                            </h4>
                            <h4 class="text-center p-3 float-right mr-5">Para
                              <?php echo $chegadas['destinoNome'] ?>
                            </h4>

                          </div>

                          <div class="w-100 text-center horaLege p-2">

                            <div class="w-50 float-left">
                              <h4>Partida</h4>
                            </div>
                            <div class="w-50 float-right">
                              <h4>Chegada</h4>
                            </div>

                          </div>

                          <div class="w-100 text-center horaInfo">

                            <div class="w-50 float-left hora">
                              <?php echo $dados['viagemIni'] ?>
                            </div>
                            <div class="w-50 float-right hora">
                              <?php echo $dados['viagemChegada'] ?>
                            </div>

                          </div>

                          <div class="w-100 text-center horaLege p-2">

                            <div class="w-50 float-left">
                              <h4>Classe da Viagem</h4>
                            </div>
                            <div class="w-50 float-right">
                              <h4>Tipo da viagem</h4>
                            </div>

                          </div>
                          <div class="w-100 text-center horaInfo">

                            <div class="w-50 float-left hora">
                              <?php echo $dados['viagemClasse'] ?>
                            </div>
                            <div class="w-50 float-right hora">
                              <?php echo $dados['viagemTipo'] ?>
                            </div>

                          </div>
                          <div class="w-100 text-center dataLege p-2">
                            <h4>Data</h4>
                          </div>
                          <div class="w-100 text-center data">
                            <?php echo $dados['viagemData'] ?>
                          </div>

                          <div class="w-100 text-center preco p-2" style="border-bottom-left-radius: 10px;">
                            <h4>
                              <?php echo $dados['viagemPreco'] ?>€
                            </h4>
                          </div>


                        </a>



                      </div>

                      <script>$("#titu").text("Viagens")</script>


                <?php } elseif ($filtro === 'hoteis') { ?>
                      <div id="caixa" class="w-50" style="max-height: 558px;">
                        <a href="hotel.php?id=<?php echo $dados['hotelId'] ?>" style="color:black !important;">

                          <h4 class="text-center tituolo pt-3" style="height:70px;">
                            <?php echo $dados['hotelNome'] ?>
                          </h4>

                          <img src="admin/<?php echo $dados['hotelImagemURL'] ?>" alt="" class="w-100" height="250px">

                          <div class="text-center horaLege pt-2">
                            <h4>Localização: &nbsp; &nbsp;
                              <?php echo $dados['concelhoNome'] ?>
                            </h4>
                          </div>

                          <div class="w-100 text-center p-2">
                            <h4 class="w-50 float-left">
                              Por Noite
                            </h4>
                            <h4 class="w-50 float-right">
                              7 Dias
                            </h4>
                          </div>

                          <div class="w-100 text-center preco p-2"
                            style="border-bottom-left-radius: 10px; margin-top: 50px; height: 60px !important;">
                            <h4 class="w-50 float-left">
                              <?php echo $dados['hotelPreco'] ?>€
                            </h4>
                            <h4 class="w-50 float-right">
                              <?php echo $dados['hotelPreco'] * 7 ?>€
                            </h4>
                          </div>

                        </a>
                      </div>
                      <script>$("#titu").text("Hoteis")</script>
                <?php } ?>
          <?php } ?>


          </div>
        </div>



        <?php
}

function drawBottomFO()
{
  ?>

      </body>
      <div class="container-fluid">
      <div class="row">
        <div class="col-12 mt-5">
          <footer class="bg-dark text-white text-center py-3">
            <p>&copy; 2023 Seu Site. Todos os direitos reservados.</p>
          </footer>
        </div>
      </div>
    </div>
      <script src="js/java.js"></script>

      </html>

      <?php
}

function fundo()
{
  ?>
      <div class="w-100" id="fundoRA">
        <?php
}

function fundoFim()
{
  ?>
      </div>
      <?php
}
function restaurantes()
{

  global $con;
  $sql = "SELECT * FROM restaurantes INNER JOIN concelhos ON concelhoId=restauranteConcelhoId";
  $result = mysqli_query($con, $sql);
  ?>

      <div class="float-left" id="caixaR">
        <h1 class="text-center p-4" id="titul">Restaurantes</h1>

        <?php while ($dados = mysqli_fetch_array($result)) { ?>

              <a href="restaurante.php?id=<?php echo $dados['restauranteId'] ?>" style="color: black !important;">
                <div id="caixaDentro">
                  <img src="admin/<?php echo $dados['restauranteImagemURL'] ?>" width="350px" height="200px" style="margin: 40px;">

                  <div class="text-center float-right w-50">
                    <h4>
                      <?php echo $dados['restauranteNome'] ?>
                    </h4>
                    <div class="text-center">
                      <?php echo $dados['restauranteDescricao'] ?>
                    </div>
                  </div>

                </div>
                <div class="text-center precoR" style=" margin-bottom: 80px;">
                  <?php echo $dados['restaurantePreco'] ?>€ / Pessoa
                </div>
              </a>
        <?php } ?>
      </div>

      <?php
}


function atividades()
{
  global $con;
  $sql = "SELECT * FROM eventos INNER JOIN concelhos ON concelhoId=eventoConcelhoId";
  $result = mysqli_query($con, $sql);
  ?>

      <div class="float-right" id="caixaA">
        <h1 class="text-center p-4" id="titul">Atividades</h1>

        <?php while ($dados = mysqli_fetch_array($result)) {

          ?>

              <a href="evento.php?id=<?php echo $dados['eventoId'] ?>" style="color: black !important;">
                <div id="caixaDentro">
                  <img src="admin/<?php echo $dados['eventoImagemURL'] ?>" width="350px" height="200px" style="margin: 40px;">

                  <div class="text-center float-right w-50">
                    <h4>
                      <?php echo $dados['eventoNome'] ?>
                    </h4>
                    <div class="text-center">
                      <?php echo $dados['eventoDescricao'] ?>
                    </div>
                  </div>

                </div>


                <div class="text-center precoR" style=" margin-bottom: 80px;">
                  <?php if ($dados['eventoPreco'] == "0") {
                    echo "GRÁTIS";
                  } else {
                    echo $dados['eventoPreco'] ?>€ / Bilhete
                        <?php
                  }
                  ?>
                </div>
        
              </a>
        <?php } ?>
      </div>

      <?php
}
?>
<!-- Fim Página Principal -->


<!-- Pacotes -->
<?php

function pacotesCima()
{ ?>

  <div id="tituloPacotes">

    Encontre o Melhor Pacote Para Você<br></div><div id="tituloPacotesSegundo"> Nesta Lista Oferecemos Vários Destinos Com Várias Viagens<br>Com Vários Hoteis Incluidos Também

  </div>

  <?php
}




function pacotes()
{

  global $con;

  if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM pacotes INNER JOIN viagens ON pacoteViagemId = viagemId 
    INNER JOIN hoteis ON pacoteHotelId = hotelId
    WHERE pacoteNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
  } else {

    $sql = "SELECT * FROM pacotes INNER JOIN viagens ON pacoteViagemId = viagemId 
    INNER JOIN hoteis ON pacoteHotelId = hotelId
    ";

    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result);
  }
  ?>
     <form action="" method="GET" id="pesquisaPacotes">
        
        <div class="dropdown dropdown-toogle" id="destinosFiltro">Destinos</div>

      </form>



      <div id="caixaPacotes"  class="d-flex flex-wrap align-items-center">
        <?php while ($dados = mysqli_fetch_array($result)) {
          $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemDestinoId']}";
          $resultado = mysqli_query($con, $sql);
          $dadosD = mysqli_fetch_array($resultado);


          $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemChegadaDestinoId']}";
          $resultd = mysqli_query($con, $sql);
          $chegadas = mysqli_fetch_array($resultd);
          ?>

            <div id="caixaPacote">

              <div id="tituloDoPacote"><?php echo $dados['pacoteNome'] ?></div>

            </div>



        <?php } ?>

      </div>

</div>
      <?php
}


function navBarPacote()
{

  ?>
      <nav class="w-100" id="navBarTopPacotes">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipoPacotes"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Pacotes</font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}
function navBarHoteis()
{

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Hoteis</font>
        </label>


        <div id="opcoes">
          <?php if (isset($_SESSION['utilizadorId'])) { ?>
                <a href="#" style="color: black !important;" class="w-100" id="link"><img class="mt-2"
                    src="admin/<?php echo $_SESSION["utilizadorImagemURL"] ?>" id="imgP">
                  <div class="text-center mx-auto p-3 dropdown-toggle" id="perfilUti">
                    <?php echo $_SESSION["utilizadorNome"] ?>
                  </div>
                </a>

                <div id="menuPerfil" class="dropdown-menu">
                  <?php if ($_SESSION['utilizadorCargo'] != "Utilizador") { ?>
                        <a class="dropdown-item p-3 text-center" href="admin/index.php"
                          style="color: black; font-weight: bold;">Gestão</a>
                  <?php } ?>
                  <a class="dropdown-item p-3 text-center" href="admin/editarPerfil.php"
                    style="color: black; font-weight: bold;">Perfil</a>
                  <a class="dropdown-item p-3 text-center" href="carrinho.php" style="color: black; font-weight: bold;">Seu Carrinho</a>
                  <a class="dropdown-item p-3 text-center" href="admin/logout.php" style="color: black; font-weight: bold;">Terminar
                    Sessão</a>

                </div>

          <?php } else { ?>
                <a href="signUp.php" style="color: black !important;" class="w-50">
                  <div class="text-center mx-auto p-3" id="signUp">Criar Conta</div>
                </a>
                <a href="login.php" style="color: black !important;" class="w-50">
                  <div class="text-center mx-auto p-3" id="login">Login</div>
                </a>
          <?php } ?>
        </div>
      </nav>
      <?php

}


function hoteis()
{
  global $con;

  if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM hoteis INNER JOIN concelhos ON hoteisConcelhoId = concelhoId WHERE hotelNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
  } else {
    $sql = "SELECT * FROM hoteis INNER JOIN concelhos ON hoteisConcelhoId = concelhoId";
    $result = mysqli_query($con, $sql);
  }
  ?>
      <form action="" method="GET" class="mb-3 mt-4 w-25 float-right" id="pesquisaH">
        <div class="input-group">
          <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
      </form>
      <div class="w-100 d-flex flex-wrap pl-4">
        <?php while ($dados = mysqli_fetch_array($result)) {
          $sql = "SELECT * FROM concelhos WHERE concelhoId = {$dados['concelhoId']}";
          $resultado = mysqli_query($con, $sql);
          $dadosC = mysqli_fetch_array($resultado)
            ?>

              <div id="caixasHoteis">
                  <div id="tri1"></div>
                  <div id="tri2"></div>

                  <label id="titsHoteis"><?php echo $dados['hotelNome'] ?></label>

                  <img src="admin/<?php echo $dados['hotelImagemURL'] ?>" id="imgHoteis">


                  <div id="caixaInfosHoteis">


                  <div id="caixaEsqHotel">
                    <div id="infoEmails">

                        <div id="tEmail">email</div>

                        <div id="dadosEmails"><?php echo $dados['hotelEmail'] ?></div>

                    </div>

                    <div id="infoEmails" style="border-radius: 0px;">

                        <div id="tEmail">telefone</div>

                        <div id="dadosEmails"><?php echo $dados['hotelTelefone'] ?></div>

                    </div>

                    <div id="infoEmails" style="border-radius: 0px;">

                        <div id="tEmail">localização</div>

                        <div id="dadosEmails"><?php echo $dadosC['concelhoNome'] ?></div>

                    </div>
                    </div>

                    <div id="caixaDirHotel">
                    <div id="infoEmails" style="border-top-left-radius:0px; border-top-right-radius:20px; ">

                        <div id="tEmail">email</div>

                        <div id="dadosEmails"><?php echo $dados['hotelEmail'] ?></div>

                    </div>

                    <div id="infoEmails" style="border-radius: 0px;">

                        <div id="tEmail">telefone</div>

                        <div id="dadosEmails"><?php echo $dados['hotelTelefone'] ?></div>

                    </div>

                    <div id="infoEmails" style="border-radius: 0px;">

                        <div id="tEmail">localização</div>

                        <div id="dadosEmails"><?php echo $dadosC['concelhoNome'] ?></div>

                    </div>
                    </div>

                  </div>
              <a href="hotel.php?id=<?php echo $dados['hotelId'] ?>"><button type="button" class="btn btn-success" id="btnSM">Saber Mais ...</button></a>

              </div>

          

              <?php
        }
        ?>

      </div>


      <?php
}



function viagens()
{
  global $con;

  if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM viagens INNER JOIN companhias ON viagemCompanhiaId = companhiaId 
    INNER JOIN destinos ON viagemDestinoId = destinoId
    WHERE destinoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
  } else {
    $sql = "SELECT * FROM viagens INNER JOIN companhias ON viagemCompanhiaId = companhiaId
    INNER JOIN destinos ON viagemDestinoId = destinoId
    ";
    $result = mysqli_query($con, $sql);
  }
  ?>

      <form action="" method="GET" class="mb-3 mt-4 w-25 float-right" id="pesquisaH">
        <div class="input-group">
          <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
      </form>

      <div class="w-100 d-flex flex-wrap">
        <?php while ($dados = mysqli_fetch_array($result)) {

          $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemChegadaDestinoId']}";
          $chegada = mysqli_query($con, $sql);
          $chegadas = mysqli_fetch_array($chegada);
          ?>

              <div id="caixaViagens">
              

                <label id="tituloViagens">Data da viagem <?php echo date('d/m/Y', strtotime($dados['viagemData'])); ?></label>

                <div id="caixaDireitaViagens">

                  <label id="campoDirTit">DESTINO DE CHEGADA</label>
                  <label id="campoDirDados"><?php echo $chegadas['destinoNome'] ?></label>


                  <label id="campoDirTit">TIPO DA VIAGEM</label>
                  <label id="campoDirDados"><?php echo $dados['viagemTipo'] ?></label>


                  <label id="campoEsqTit">HORA DE PARTIDA</label>
                  <label id="campoEsqDados"><?php echo date('H:i', strtotime($dados['viagemIni'])); ?></label>


                  <label id="campoEsqTit">SUPORTE TÉCNICO</label>
                  <label id="campoEsqDados"><?php echo $dados['viagemTelefone']; ?></label>             

                </div>


                <div id="caixaEsquerdaViagens">
              
                  <label id="campoDirTit">DESTINO DE PARTIDA</label>
                  <label id="campoDirDados"><?php echo $dados['destinoNome'] ?></label>

                  <label id="campoEsqTit">CLASSE DA VIAGEM</label>
                  <label id="campoEsqDados"><?php echo $dados['viagemClasse'] ?></label>

                  <label id="campoDirTit">HORA DE CHEGADA</label>
                  <label id="campoDirDados"><?php echo date('H:i', strtotime($dados['viagemChegada'])); ?></label>

                  <label id="campoDirTit">LUGARES DISPONIVEIS</label>
                  <label id="campoDirDados">
                    <?php
                    if ($dados['viagemLugares'] == 0) { ?>
                        <font style="color:red;">LUGARES ESGOTADOS</font>
                      <?php
                    } else {
                      echo $dados['viagemLugares']; ?> Lugares</label><?php
                    } ?>

                </div>
            
            
            
              <a href="viagem.php?id=<?php echo $dados['viagemId'] ?>"><button type="button" class="btn btn-success" id="btnSMV">Saber Mais ...</button></a>

              </div>

              <?php
        }
        ?>

      </div>


      <?php
}

function navBarViagens()
{

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../siteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Viagens</font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}

function navBarAtividades()
{

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Atividades</font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function atividadesP()
{
  global $con;

  $id = addslashes($_GET['id']);

  if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM eventos INNER JOIN concelhos ON eventoConcelhoId = concelhoId WHERE eventoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
  } else {

    $sql = "SELECT * FROM eventos INNER JOIN concelhos ON eventoConcelhoId = concelhoId WHERE eventoTipo='$id'";
    $result = mysqli_query($con, $sql);
  }

  ?>

      <h1 class="w-100 text-center">
        <?php echo $id; ?>
      </h1>

      <form action="" method="GET" class="mb-3 w-25 float-right" id="pesquisaH">
        <div class="input-group">
          <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
          <input type="text" hidden class="form-control" name="id" value="<?php echo $id ?>">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
      </form>


      <div class="w-100 d-flex flex-wrap pl-4">
        <?php while ($dados = mysqli_fetch_array($result)) {

          $sql = "SELECT * FROM atividades WHERE atividadeEventoId = {$dados['eventoId']}";
          $resultado = mysqli_query($con, $sql);
          ?>

              <div id="caixaHoteis">

                <a href="evento.php?id=<?php echo $dados['eventoId'] ?>" style="color:black;">
                  <div class="text-center w-100"
                    style="color:white; padding-top:10px; font-size: 24pt;height:70px;border-bottom:solid 3px white;">
                    <?php echo $dados['eventoNome'] ?>
                  </div>

                  <div id="containerImg" class="float-left">
                    <img src="admin/<?php echo $dados['eventoImagemURL'] ?>" width="450px" height="250px"
                      style="border-top-left-radius: 10px;">
                  </div>


                  <div>

                    <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Email</div>
                    <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                      <?php echo $dados['eventoEmail'] ?>
                    </div>

                    <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Tipo</div>
                    <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                      <?php echo $dados['eventoTipo'] ?>
                    </div>

                  </div>

                  <div></div>

                  <div id="campoCima">Localização</div>

                  <div>

                    <div id="campoCima" style="background-color:#0a6ee9">
                      <?php echo $dados['concelhoNome'] ?>
                    </div>

                    <div id="campoCima" style="background-color: #1f559c; color: white">

                      <div id="campoEsq" class="w-50 text-center">Começa </div>
                      <div id="campoDir" class="w-50 text-center">Acaba</div>

                    </div>

                    <div id="campoCima">

                      <div id="campoEsq" class="w-50 text-center">
                        <?php echo date('d/m/Y', strtotime($dados['eventoDataC'])); ?>
                      </div>
                      <div id="campoDir" class="w-50 text-center">
                        <?php echo date('d/m/Y', strtotime($dados['eventoDataA'])); ?>
                      </div>
                    </div>

                    <div id="ativ" style="height: auto;"><?php
                    if (mysqli_num_rows($resultado) > 0) { ?><h5>Atividades</h5><?php
                        while ($dadosC = mysqli_fetch_array($resultado)) {
                          echo $dadosC['atividadeNome'] . "<br>";
                        }
                    } else {
                      echo "Nenhuma Atividade";
                    }
                    ?></div>





                    <div id="campoCima" class="text-center"
                      style="font-size:18pt; padding-top:10px;color:white;background-color:#0a6ee9;">
                      <?php if ($dados['eventoPreco'] == "0") {
                        echo "GRÁTIS";
                      } else {
                        echo $dados['eventoPreco'] ?>€ / Entrada
                            <?php
                      }
                      ?>
                    </div>



                  </div>
          
        <?php
        botao($dados['eventoId'], $dados['eventoNome'], $dados['eventoPreco']);
        ?>
                    </a>
              </div>


              <?php
        }
        ?>

      </div>


      <?php
}

function navBarPaises()
{

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Paises</font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}
function paises()
{
  global $con;

  if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM destinos WHERE destinoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
  } else {

    $sql = "SELECT * FROM destinos";
    $result = mysqli_query($con, $sql);
  }
  ?>
      <form action="" method="GET" class="mb-3 mt-4 w-25 float-right" id="pesquisaH">
        <div class="input-group">
          <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
      </form>


      <div class="w-100 d-flex flex-wrap">
        <?php while ($dados = mysqli_fetch_array($result)) {
          $sql = "SELECT * FROM concelhos WHERE concelhoDestinoId = {$dados['destinoId']}";
          $resultado = mysqli_query($con, $sql);
          ?>
              <div id="caixaPais">
                <a href="pais?id=<?php echo $dados['destinoId'] ?>">

                  <h3 class="text-center p-2">
                    <?php echo $dados['destinoNome'] ?>
                  </h3>

                  <img src="admin/<?php echo $dados['destinoImagemURL'] ?>" width="100%" height="310px">

                  <div class="text-center p-3">
                    <h4>Descrição</h4>
                    <?php echo $dados['destinoDescricao'] ?>
                  </div>

                  <h4 class="text-center p-2" style="border-top: solid 3px white;">Concelhos</h4>
                  <div class="text-center w-100 d-flex flex-wrap" style="height:70px;">
                    <?php
                    if (mysqli_num_rows($resultado) > 0) {
                      while ($dadosC = mysqli_fetch_array($resultado)) {
                        ?>
                                <a href="concelho.php?id=<?php echo $dadosC['concelhoId'] ?>">
                                <div id="concelho">
                                  <?php echo $dadosC['concelhoNome'] . "<br><br>";
                                  ?>
                                </div>
                              </a>
                                <?php
                      }
                    } else {
                      ?>
                          <div id="concelho">
                            <?php
                            echo "Nenhum Concelho";
                            ?>
                          </div>
                          <?php
                    }
                    ?>
                  </div>

                </a>
              </div>


        <?php } ?>



      </div>

      <?php
}

function navBarConcelhos()
{

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Concelhos</font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}
function concelhos()
{
  global $con;

  if (isset($_GET['q']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM concelhos INNER JOIN destinos ON concelhoDestinoId = destinoId WHERE concelhoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
  } else {

    $sql = "SELECT * FROM concelhos INNER JOIN destinos ON concelhoDestinoId = destinoId";
    $result = mysqli_query($con, $sql);

  }
  ?>
      <form action="" method="GET" class="mb-3 mt-4 w-25 float-right" id="pesquisaH">
        <div class="input-group">
          <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
      </form>


      <div class="w-100 d-flex flex-wrap">
        <?php while ($dados = mysqli_fetch_array($result)) {
          ?>
              <div id="caixaPais">
                <a href="concelho?id=<?php echo $dados['concelhoId'] ?>">

                  <h3 class="text-center p-2">
                    <?php echo $dados['concelhoNome'] ?>
                  </h3>

                  <img src="admin/<?php echo $dados['concelhoImagemURL'] ?>" width="100%" height="310px">

                  <div class="text-center p-3">
                    <h4>Descrição</h4>
                    <?php echo $dados['concelhoDescricao'] ?>
                  </div>

                  <h4 class="text-center p-2" style="border-top: solid 3px white;">País</h4>
                  <a href="pais.php?id=<?php echo $dados['destinoId'] ?>">
                  <div class="text-center w-100" id="pais" style="font-size: 22pt"><?php echo $dados['destinoNome'] ?></div>
                </a>
              </div>


        <?php } ?>



      </div>

      <?php


}


function navBarMonumentos()
{

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Monumentos</font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function monumentos()
{
  global $con;

  if (isset($_GET['q']) && !empty($_GET['q'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['q']);
    $sql = "SELECT * FROM monumentos INNER JOIN concelhos ON monumentoConcelhoId = concelhoId WHERE monumentoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
  } else {

    $sql = "SELECT * FROM monumentos INNER JOIN concelhos ON monumentoConcelhoId=concelhoId";
    $result = mysqli_query($con, $sql);
  }
  ?>
      <form action="" method="GET" class="mb-3 mt-4 w-25 float-right" id="pesquisaH">
        <div class="input-group">
          <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
      </form>
      <div class="w-100 d-flex flex-wrap pl-4">
        <?php while ($dados = mysqli_fetch_array($result)) {
          $sql = "SELECT * FROM concelhos WHERE concelhoId = {$dados['concelhoId']}";
          $resultado = mysqli_query($con, $sql);
          ?>

              <div id="caixaHoteis">

                <a href="monumento.php?id=<?php echo $dados['monumentoId'] ?>" style="color:black;">
                  <div class="text-center w-100"
                    style="color:white; padding-top:10px; font-size: 24pt;height:70px;border-bottom:solid 3px white;">
                    <?php echo $dados['monumentoNome'] ?>
                  </div>

                  <div id="containerImg" class="float-left">
                    <img src="admin/<?php echo $dados['monumentoImagemURL'] ?>" width="450px" height="250px">
                  </div>


                  <div>

                    <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Email</div>
                    <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                      <?php echo $dados['monumentoEmail'] ?>
                    </div>

                    <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Telefone</div>
                    <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                      <?php echo $dados['monumentoTelefone'] ?>
                    </div>

                  </div>

                  <div class="text-center w-100" style="color:white; padding-top:20px; font-size: 18pt;">Localização</div>

                  <div>

                    <div class="w-100 text-center"
                      style="color:white; padding-top:10px;background-color:#0a6ee9; font-size: 18pt; height:50px;">
                      <?php
                      if (mysqli_num_rows($resultado) > 0) {
                        while ($dadosC = mysqli_fetch_array($resultado)) {
                          echo $dadosC['concelhoNome'] . "<br><br>";
                        }
                      } else {
                        echo "Nenhum Concelho";
                      }
                      ?>
                    </div>

        <?php if ($dados['monumentoPreco'] != 0) { ?>
                        <div class="w-100 text-center pt-2" style="height:50px; background-color: rgb(11, 11, 114); color: white;">
                          <div class="w-25 float-left">1 DIA
                          </div>
                          <div class="w-25 float-left" style="margin-left:70px;">5 DIAS
                          </div>
                          <div class="w-25 float-right">1 SEMANA
                          </div>
                        </div>

                        <div class="w-100 text-center"
                          style="height:50px; background-color: rgb(11, 11, 114); color: white;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
              
                          <div class="w-25 float-left">
                            <?php echo $dados['monumentoPreco'] ?>€
                          </div>
                          <div class="w-25 float-left" style="margin-left:70px">
                            <?php echo $dados['monumentoPreco'] * 5 ?>€
                          </div>
                          <div class="w-25 float-right">
                            <?php echo $dados['monumentoPreco'] * 7 ?>€
                          </div>
                        </div>
            
                      </div><?php } else { ?>
                        <div class="w-100 text-center" style="height:100px; padding-top: 30px; background-color: rgb(11, 11, 114); color: white;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                          GRÁTIS</div>
                      <?php } ?>
              
        <?php
        botao($dados['monumentoId'], $dados['monumentoNome'], $dados['monumentoPreco']);
        ?>
                </a>
              </div>


              <?php
        }
        ?>

      </div>


      <?php
}

function navBarRestaurantes()
{

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Restaurantes</font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function restaurantesss()
{
  global $con;

  if (isset($_GET['q']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM restaurantes INNER JOIN concelhos ON concelhoId=restauranteConcelhoId WHERE concelhoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
  } else {

    $sql = "SELECT * FROM restaurantes INNER JOIN concelhos ON concelhoId=restauranteConcelhoId";
    $result = mysqli_query($con, $sql);

  }
  ?>
      <form action="" method="GET" class="mb-3 mt-4 w-25 float-right" id="pesquisaH">
        <div class="input-group">
          <input type="text" class="form-control" name="escrevo" placeholder="Pesquisar..."
            value="<?php echo isset($_GET['escrevo']) ? $_GET['escrevo'] : ''; ?>">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
      </form>
      <div class="w-100 d-flex flex-wrap pl-4">
        <?php while ($dados = mysqli_fetch_array($result)) {
          $sql = "SELECT * FROM concelhos WHERE concelhoId = {$dados['concelhoId']}";
          $resultado = mysqli_query($con, $sql);
          ?>

              <div id="caixaHoteis">

                <a href="restaurante.php?id=<?php echo $dados['restauranteId'] ?>" style="color:black;">
                  <div class="text-center w-100"
                    style="color:white; padding-top:10px; font-size: 24pt;height:70px;border-bottom:solid 3px white;">
                    <?php echo $dados['restauranteNome'] ?>
                  </div>

                  <div id="containerImg" class="float-left">
                    <img src="admin/<?php echo $dados['restauranteImagemURL'] ?>" width="450px" height="250px">
                  </div>


                  <div>

                    <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Telefone</div>
                    <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                      <?php echo $dados['restauranteTelefone'] ?>
                    </div>

                  </div>

                  <div class="text-center w-100" style="color:white; padding-top:20px; font-size: 18pt;">Localização</div>

                  <div>

                    <div class="w-100 text-center"
                      style="color:white; padding-top:10px;background-color:#0a6ee9; font-size: 18pt; height:70px;">
                      <?php
                      if (mysqli_num_rows($resultado) > 0) {
                        while ($dadosC = mysqli_fetch_array($resultado)) {
                          echo $dadosC['concelhoNome'] . "<br><br>";
                        }
                      } else {
                        echo "Nenhum Concelho";
                      }
                      ?>
                    </div>

                    <div class="w-100 text-center pt-2"
                      style="height:70px; background-color: rgb(11, 11, 114); color: white;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px; font-size: 24pt;">
                        <?php echo $dados['restaurantePreco'] ?>€ / Pessoa
                    </div>
            
                  </div>
        <?php
        botao($dados['restauranteId'], $dados['restauranteNome'], $dados['restaurantePreco']);
        ?>
                </a>
              </div>


              <?php
        }
        ?>

      </div>


      <?php
}



/*********************Individual*****************************/

function navBarHotel($id)
{
  global $con;

  $sql = "select * from hoteis where hotelId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center"><?php echo $dados['hotelNome'] ?></font>
        </label>
        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function hotel($id)
{
  global $con;

  $sql = "SELECT * FROM hoteis INNER JOIN concelhos ON hoteisConcelhoId = concelhoId WHERE hotelId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>

  <div id="caixaInfos">
      <label id="tituloInfo"><?php echo $dados['hotelNome']; ?></label>

      <div id="imgInfo">
          <img id="imagemInfo" src="admin/<?php echo $dados['hotelImagemURL']; ?>">
          <label id="descInfo"><?php echo $dados['hotelDescricao']; ?></label>
      </div>

      <div id="caixaInfo">
          <div id="caixaEmail">
              <div id="infoEmail">Email</div>
              <div id="emailInfo"><?php echo $dados['hotelEmail'] ?></div>
          </div>

          <div id="caixaTel">
              <div id="infoTel">Telefone</div>
              <div id="telInfo"><?php echo $dados['hotelTelefone'] ?></div>
          </div>

          <div id="caixaPreco">
              <div id="infoPreco1">1 Noite</div>
              <div id="infoPreco2">5 Noites</div>
              <div id="infoPreco3">1 Semana</div>
              <div id="precoInfo1"><?php echo $dados['hotelPreco'] ?>€</div>
              <div id="precoInfo2"><?php echo $dados['hotelPreco'] * 5 ?>€</div>
              <div id="precoInfo3"><?php echo $dados['hotelPreco'] * 7 ?>€</div>
          </div>

          <div id="caixaConcelho">
              <div id="infoConcelho">Localização</div>
              <div id="concelhoInfo"><?php echo $dados['concelhoNome'] ?></div>
          </div>
      </div>

      <input type="button" value="Reserve já" class="btn btn-success" id="btnHotel">

  <?php botao($dados['hotelId'], $dados['hotelNome'], $dados['hotelPreco']); ?>
       
  </div>

      <?php
}


function recomendR()
{
  global $con;

  $sql = "SELECT * FROM restaurantes INNER JOIN concelhos ON concelhoId=restauranteConcelhoId";
  $result = mysqli_query($con, $sql);
  ?>
     

              <h1 class="p-3 text-center" style="background-color: #1f559c;margin-bottom:0px;">Restaurantes Recomendados</h1>

              <table class="w-100">
        <thead>
            <tr id="linhaRec" style="background-color: #0a6ee9;">
                <th>Nome</th>
                <th>Imagem</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Localização</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dados = mysqli_fetch_array($result)) { ?>
                    <tr id="linhaRec" class="linha" data-link="restaurante.php?id=<?php echo $dados['restauranteId'] ?>">
                        <td><?php echo $dados['restauranteNome'] ?></td>
                        <td><img src="admin/<?php echo $dados['restauranteImagemURL'] ?>" width="200px" height="100px"></td>
                        <td><?php echo substr($dados['restauranteDescricao'], 0, 50) ?></td>
                        <td><?php echo $dados['restaurantePreco'] ?>€</td>
                        <td><?php echo $dados['concelhoNome'] ?></td>
                    </tr>
            <?php } ?>  
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $(".linha").on("click", function() {
                window.location = $(this).data("link");
            });
        });
    </script>



      <?php
}

/*************************Restaurante*******************/
function navBarRestaurante($id)
{
  global $con;

  $sql = "select * from restaurantes where restauranteId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Restaurante <?php echo $dados['restauranteNome'] ?></font>
        </label>
        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function restaurante($id)
{
  global $con;


  $sql = "SELECT * FROM restaurantes INNER JOIN concelhos ON concelhoId=restauranteConcelhoId where restauranteId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
          <div id="caixaHotel" class="w-75">

            <div class="text-center w-100"
                style="color:white; padding-top:10px; font-size: 24pt;height:70px;border-bottom:solid 3px white;">Restaurante
                <?php echo $dados['restauranteNome'] ?>
              </div>

              <div id="containerImg" class="text-center p-3" style="border-bottom: solid 3px white">
                <img src="admin/<?php echo $dados['restauranteImagemURL'] ?>" width="650px" height="400px">
              </div>

              <h4 class="text-center p-1">Descrição</h4>
              <div class="text-center p-2" style="font-size:18pt; border-bottom: solid 3px white; color: white"><?php echo $dados['restauranteDescricao'] ?></div>


                <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Telefone</div>
                <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                  <?php echo $dados['restauranteTelefone'] ?>
                </div>

    <div class="text-center w-100" style="color:white; padding-top:20px; font-size: 18pt;">Localização</div>


                <div class="w-100 text-center"
                  style="color:white; padding-top:10px;background-color:#0a6ee9; font-size: 18pt; height:50px;">
                  <?php echo $dados['concelhoNome'] . "<br><br>"; ?>
                </div>


                <div class="w-100 text-center"
                  style="color:white; padding-top:10px; font-size: 18pt; height:50px;">
                  <?php echo $dados['restaurantePreco'] ?>€ / Pessoa
                </div>


              </div>

          


    </div>

      <?php
}


function recomendM()
{
  global $con;

  $sql = "SELECT * FROM monumentos INNER JOIN concelhos ON monumentoConcelhoId=concelhoId";
  $result = mysqli_query($con, $sql);
  ?>
     

              <h1 class="p-3 text-center" style="background-color: #1f559c;margin-bottom:0px">Monumentos Recomendados</h1>

              <table class="w-100">
        <thead>
            <tr id="linhaRec" style="background-color: #0a6ee9;">
                <th>Nome</th>
                <th>Imagem</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Localização</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dados = mysqli_fetch_array($result)) { ?>
                    <tr id="linhaRec" class="linha" data-link="monumento.php?id=<?php echo $dados['monumentoId'] ?>">
                        <td><?php echo $dados['monumentoNome'] ?></td>
                        <td><img src="admin/<?php echo $dados['monumentoImagemURL'] ?>" width="200px" height="100px"></td>
                        <td><?php echo substr($dados['monumentoDescricao'], 0, 50) ?></td>
                        <td><?php
                        if ($dados['monumentoPreco'] == 0) {
                          ?>
                                GRÁTIS
                              <?php
                        } else {
                          echo $dados['monumentoPreco'] ?>€
                        <?php } ?></td>
                        <td><?php echo $dados['concelhoNome'] ?></td>
                    </tr>
            <?php } ?>  
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $(".linha").on("click", function() {
                window.location = $(this).data("link");
            });
        });
    </script>



      <?php
}

/***********Monumentos***************/
function navBarMonumento($id)
{
  global $con;

  $sql = "select * from monumentos where monumentoId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center"><?php echo $dados['monumentoNome'] ?></font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function monumento($id)
{
  global $con;


  $sql = "SELECT * FROM monumentos INNER JOIN concelhos ON concelhoId=monumentoConcelhoId where monumentoId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
          <div id="caixaHotel" class="w-75">

            <div class="text-center w-100"
                style="color:white; padding-top:10px; font-size: 24pt;height:70px;border-bottom:solid 3px white;"><?php echo $dados['monumentoNome'] ?>
              </div>

              <div id="containerImg" class="text-center p-3" style="border-bottom: solid 3px white">
                <img src="admin/<?php echo $dados['monumentoImagemURL'] ?>" width="650px" height="400px">
              </div>

              <h4 class="text-center p-1">Descrição</h4>
              <div class="text-center p-2" style="font-size:18pt; border-bottom: solid 3px white; color: white"><?php echo $dados['monumentoDescricao'] ?></div>


                <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Telefone</div>
                <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                  <?php echo $dados['monumentoTelefone'] ?>
                </div>

    <div class="text-center w-100" style="color:white; padding-top:20px; font-size: 18pt;">Localização</div>


                <div class="w-100 text-center"
                  style="color:white; padding-top:10px;background-color:#0a6ee9; font-size: 18pt; height:50px;">
                  <?php echo $dados['concelhoNome'] . "<br><br>"; ?>
                </div>


                <div class="w-100 text-center"
                  style="color:white; padding-top:10px; font-size: 18pt; height:50px;">
                  <?php
                  if ($dados['monumentoPreco'] == 0) {
                    ?>
                            GRÁTIS
                          <?php
                  } else {
                    echo $dados['monumentoPreco'] ?>€
                    <?php } ?>
                </div>


              </div>

          


    </div>

      <?php
}


function recomendH()
{
  global $con;

  $sql = "SELECT * FROM hoteis INNER JOIN concelhos ON hoteisConcelhoId=concelhoId";
  $result = mysqli_query($con, $sql);
  ?>
     

              <h1 class="p-3 text-center" style="background-color: #1f559c;margin-bottom:0px">Hotéis Recomendados</h1>

              <table class="w-100">
        <thead>
            <tr id="linhaRec" style="background-color: #0a6ee9;"> 
                <th style="width:15%">Nome</th>
                <th>Imagem</th>
                <th style="width:15%" >Descrição</th>
                <th>Preço</th>
                <th>Localização</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dados = mysqli_fetch_array($result)) { ?>
                    <tr id="linhaRec" class="linha" data-link="hotel.php?id=<?php echo $dados['hotelId'] ?>">
                        <td><?php echo $dados['hotelNome'] ?></td>
                        <td><img src="admin/<?php echo $dados['hotelImagemURL'] ?>" width="200px" height="100px"></td>
                        <td><?php echo substr($dados['hotelDescricao'], 0, 50) ?></td>
                        <td><?php
                        if ($dados['hotelPreco'] == 0) {
                          ?>
                                GRÁTIS
                              <?php
                        } else {
                          echo $dados['hotelPreco'] ?>
                        <?php } ?></td>
                        <td><?php echo $dados['concelhoNome'] ?></td>
                    </tr>
            <?php } ?>  
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $(".linha").on("click", function() {
                window.location = $(this).data("link");
            });
        });
    </script>



      <?php
}

/*************************Pacote***************************/
function navBarPacotes($id)
{
  global $con;

  $sql = "select * from pacotes where pacoteId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center"><?php echo $dados['pacoteNome'] ?></font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function pacote($id)
{
  global $con;

  $sql = "SELECT * FROM pacotes INNER JOIN viagens ON pacoteViagemId = viagemId 
  INNER JOIN hoteis ON pacoteHotelId = hotelId
  ";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemDestinoId']}";
  $resultado = mysqli_query($con, $sql);
  $dadosD = mysqli_fetch_array($resultado);

  $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemChegadaDestinoId']}";
  $resultd = mysqli_query($con, $sql);
  $chegadas = mysqli_fetch_array($resultd);

  ?>
          <div id="caixaHotelP">

      
          <a href="hotel.php?id=<?php echo $dados['hotelId'] ?>" style="color:black !important;">
    <div class="text-center w-100"
        style="color:white; padding-top:10px; font-size: 24pt;height:70px;border-bottom:solid 3px white;">Hotel
        <?php echo $dados['hotelNome'] ?>
      </div>




      <div id="containerImg" class="text-center p-3" style="border-bottom: solid 3px white">
        <img src="admin/<?php echo $dados['hotelImagemURL'] ?>" width="650px" height="400px">
      </div>

      <h4 class="text-center p-1">Descrição</h4>
      <div class="text-center p-2" style="font-size:18pt; border-bottom: solid 3px white; color: white"><?php echo $dados['hotelDescricao'] ?></div>

      <div>

        <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Email</div>
        <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
          <?php echo $dados['hotelEmail'] ?>
        </div>

        <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Telefone</div>
        <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
          <?php echo $dados['hotelTelefone'] ?>
        </div>

      </div>

      <div class="text-center w-100" style="color:white; padding-top:20px; font-size: 18pt;">Localização</div>

      <div>

        <div class="w-100 text-center"
          style="color:white; padding-top:10px;background-color:#0a6ee9; font-size: 18pt; height:50px;">
          <?php echo $dadosD['destinoNome'] . "<br><br>"; ?>
        
        </div>


        <div class="w-100 text-center pt-2" style="height:50px; background-color: rgb(11, 11, 114); color: white;">
          <div class="w-25 float-left">1 DIA
          </div>
          <div class="w-50 float-left">5 DIAS
          </div>
          <div class="w-25 float-right">1 SEMANA
          </div>
        </div>

        <div class="w-100 text-center"
          style="height:50px; background-color: rgb(11, 11, 114); color: white;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
          <div class="w-25 float-left">
            <?php echo $dados['hotelPreco'] ?>€
          </div>
          <div class="w-50 float-left">
            <?php echo $dados['hotelPreco'] * 5 ?>€
          </div>
          <div class="w-25 float-right">
            <?php echo $dados['hotelPreco'] * 7 ?>€
          </div>
        </div>
      </div>
    </a>
    </div>

    <div id="caixaViagensP">


            <a href="viagens.php" style="color:black;">
              <div id="campoCima" style="background-color: #1f559c; color: white">
                <div id="campoEsq">De
                  <?php echo $dadosD['destinoNome'] ?>
                </div>
                <div id="campoDir">Para
                  <?php echo $chegadas['destinoNome'] ?>
                </div>
              </div>
              <div id="campoCima" class="text-center" style="font-size:18pt; padding-top:10px;">
                <?php echo date('d/m/Y', strtotime($dados['viagemData'])); ?>
              </div>

              <div id="campoCima" style="background-color: #1f559c; color: white">

                <div id="campoEsq" class="w-50 text-center">Partida</div>
                <div id="campoDir" class="w-50 text-center">Chegada</div>

              </div>

              <div id="campoCima">

                <div id="campoEsq" class="w-50 text-center">
                  <?php echo date('H:i', strtotime($dados['viagemIni'])); ?>
                </div>
                <div id="campoDir" class="w-50 text-center">
                  <?php echo date('H:i', strtotime($dados['viagemChegada'])); ?>
                </div>

              </div>


              <div id="campoCima" class="text-center"
                style="font-size:18pt; padding-top:10px;background-color: #1f559c; color: white">Suporte Telefónico:
                <?php echo $dados['viagemTelefone'] ?>
              </div>


              <div id="campoCima" class="text-center" style="font-size:18pt; padding-top:10px;">
                <?php echo $dados['viagemPreco'] ?>€ / Bilhete
              </div>










            </a>
          </div>


      <?php
}


function recomendPais()
{
  global $con;

  $sql = "SELECT * FROM destinos";
  $result = mysqli_query($con, $sql);

  ?>
     

              <h1 class="p-3 text-center float-right" style="background-color: #1f559c; margin-right:30px;margin-bottom:0px; width:1400px;">Destinos Recomendados</h1>

              <table class="float-right" style="width:1400px; margin-right:30px">
        <thead>
            <tr id="linhaRec" style="background-color: #0a6ee9;"> 
                <th style="width:15%">Nome</th>
                <th>Imagem</th>
                <th style="width:15%" >Descrição</th>
                <th>Concelhos</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dados = mysqli_fetch_array($result)) {

              $sql = "SELECT * FROM concelhos WHERE concelhoDestinoId = {$dados['destinoId']}";
              $resultado = mysqli_query($con, $sql);
              $dadosC = mysqli_fetch_array($resultado);
              ?>

                    <tr id="linhaRec" class="linha" data-link="pais.php?id=<?php echo $dados['destinoId'] ?>">
                        <td><?php echo $dados['destinoNome'] ?></td>
                        <td><img src="admin/<?php echo $dados['destinoImagemURL'] ?>" width="200px" height="100px"></td>
                        <td><?php echo substr($dados['destinoDescricao'], 0, 50) ?></td>
                        <td><?php
                        if (mysqli_num_rows($resultado) > 0) {
                          while ($dadosC = mysqli_fetch_array($resultado)) {
                            echo $dadosC['concelhoNome'] . "<br><br>";
                          }
                        } else {
                          echo "Nenhum Concelho";
                        }
                        ?></td>
                    </tr>
            <?php } ?>  
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $(".linha").on("click", function() {
                window.location = $(this).data("link");
            });
        });
    </script>



      <?php
}

/**************************Pais*****************************************/

function navBarPais($id)
{
  global $con;

  $sql = "select * from destinos where destinoId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center"><?php echo $dados['destinoNome'] ?></font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function pais($id)
{
  global $con;


  $sql = "SELECT * FROM destinos where destinoId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);


  $sql = "SELECT * FROM concelhos WHERE concelhoDestinoId = {$dados['destinoId']}";
  $resultado = mysqli_query($con, $sql);
  ?>
      
          <h1 class="text-center p-3"><?php echo $dados['destinoNome'] ?></h1>

          <div class="text-center p-3"><img src="admin/<?php echo $dados['destinoImagemURL'] ?>"></div>

          <div class="text-center  p-3"><?php echo $dados['destinoDescricao'] ?></div>

          <h2 class="text-center p-3" style="background-color: #1f559c;">Distritos</h2>
          <div class="text-center p-2">
            <?php
            if (mysqli_num_rows($resultado) > 0) {
              while ($dadosC = mysqli_fetch_array($resultado)) {
                echo $dadosC['concelhoNome'] . "<br><br>";
              }
            } else {
              echo "Nenhum Concelho";
            }
            ?>
          </div>  

      <?php
}


function recomendC()
{
  global $con;


  $sql = "SELECT * FROM concelhos INNER JOIN destinos ON concelhoDestinoId = destinoId";
  $result = mysqli_query($con, $sql);
  ?>
     

              <h1 class="p-3 text-center" style="background-color: #1f559c;margin-bottom:0px">Dístritos Recomendados</h1>

              <table class="w-100">
        <thead>
            <tr id="linhaRec" style="background-color: #0a6ee9;">
                <th>Nome</th>
                <th>Imagem</th>
                <th>Descrição</th>
                <th>Pais</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dados = mysqli_fetch_array($result)) { ?>
                    <tr id="linhaRec" class="linha" data-link="concelho.php?id=<?php echo $dados['concelhoId'] ?>">
                        <td><?php echo $dados['concelhoNome'] ?></td>
                        <td><img src="admin/<?php echo $dados['concelhoImagemURL'] ?>" width="200px" height="100px"></td>
                        <td><?php echo substr($dados['concelhoDescricao'], 0, 50) ?></td>
                        <td><?php echo $dados['destinoNome'] ?></td>
                    </tr>
            <?php } ?>  
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $(".linha").on("click", function() {
                window.location = $(this).data("link");
            });
        });
    </script>



      <?php
}


/********************************Concelhos**************************************/

function navBarConcelho($id)
{
  global $con;

  $sql = "select * from concelhos where concelhoId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center"><?php echo $dados['concelhoNome'] ?></font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


function concelho($id)
{
  global $con;


  $sql = "SELECT * FROM concelhos INNER JOIN destinos ON concelhoDestinoId = destinoId WHERE concelhoId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);


  ?>
      
          <h1 class="text-center p-3"><?php echo $dados['concelhoNome'] ?></h1>

          <div class="text-center p-3"><img src="admin/<?php echo $dados['concelhoImagemURL'] ?>"></div>

          <div class="text-center  p-4"><?php echo $dados['concelhoDescricao'] ?></div>

          <h2 class="text-center p-3" style="background-color: #1f559c;">Concelho</h2>
          <div class="text-center p-5">
            <?php echo $dados['destinoNome'] ?>
          </div>  

      <?php
}

/******************************Atividades***********************************************/


function atividade($id)
{
  global $con;

  $id = addslashes($_GET['id']);


  $sql = "SELECT * FROM eventos INNER JOIN concelhos ON eventoConcelhoId = concelhoId WHERE eventoId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);


  $sql = "SELECT * FROM atividades WHERE atividadeEventoId = {$dados['eventoId']}";
  $resultado = mysqli_query($con, $sql);
  ?>

      <h1 class="w-100 text-center">
      </h1>



      <div class="w-100 d-flex flex-wrap pl-4">
      

          <div id="caixaHoteis" class="w-50" style="
    margin-left: 550px;">

            <div class="text-center w-100"
                style="color:white; padding-top:10px; font-size: 24pt;height:70px;border-bottom:solid 3px white;">
                <?php echo $dados['eventoNome'] ?>
              </div>

              <div id="containerImg" class="float-left">
                <img src="admin/<?php echo $dados['eventoImagemURL'] ?>" width="450px" height="250px"
                  style="border-top-left-radius: 10px;">
              </div>


              <div>

                <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Email</div>
                <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                  <?php echo $dados['eventoEmail'] ?>
                </div>

                <div class="w-100 text-center pt-3" style="height:62px;color: white; font-size: 18pt;">Tipo</div>
                <div class="w-100 text-center pt-2" style="height:62px;color: white; font-size: 18pt;background-color:#0a6ee9">
                  <?php echo $dados['eventoTipo'] ?>
                </div>

              </div>

              <div></div>

              <div id="campoCima">Localização</div>

              <div>

                <div id="campoCima" style="background-color:#0a6ee9">
                  <?php echo $dados['concelhoNome'] ?>
                </div>

                <div id="campoCima" style="background-color: #1f559c; color: white">

                  <div id="campoEsq" class="w-50 text-center">Começa </div>
                  <div id="campoDir" class="w-50 text-center">Acaba</div>

                </div>

                <div id="campoCima">

                  <div id="campoEsq" class="w-50 text-center">
                    <?php echo date('d/m/Y', strtotime($dados['eventoDataC'])); ?>
                  </div>
                  <div id="campoDir" class="w-50 text-center">
                    <?php echo date('d/m/Y', strtotime($dados['eventoDataA'])); ?>
                  </div>
                </div>

                <div id="ativ" style="height: auto;"><?php
                if (mysqli_num_rows($resultado) > 0) { ?><h5>Atividades</h5><?php
                    while ($dadosC = mysqli_fetch_array($resultado)) {
                      echo $dadosC['atividadeNome'] . "<br>";
                    }
                } else {
                  echo "Nenhuma Atividade";
                }
                ?></div>





                <div id="campoCima" class="text-center"
                  style="font-size:18pt; padding-top:10px;color:white;background-color:#0a6ee9;">
                  <?php if ($dados['eventoPreco'] == "0") {
                    echo "GRÁTIS";
                  } else {
                    echo $dados['eventoPreco'] ?>€ / Entrada
                        <?php
                  }
                  ?>
                </div>



              </div>
          </div>



      </div>


      <?php
}

function navBarAtividade($id)
{
  global $con;

  $sql = "select * from eventos where eventoId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center"><?php echo $dados['eventoNome'] ?></font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}

function navBarCarrinho()
{

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}


/***********************************Viagem******************************************************/
function viagem($id)
{
  global $con;


  $sql = "SELECT * FROM viagens INNER JOIN destinos ON viagemDestinoId = destinoId WHERE viagemId='$id'";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  $sqli = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemChegadaDestinoId']}";
  $chegada = mysqli_query($con, $sqli);
  $chegadas = mysqli_fetch_array($chegada);

  ?>

            <div id="caixaViagemUni">
              

              <label id="tituloViagens">Data da viagem <?php echo date('d/m/Y', strtotime($dados['viagemData'])); ?></label>

              <div id="caixaDireitaViagens">

                <label id="campoDirTit">DESTINO DE CHEGADA</label>
                <label id="campoDirDados"><?php echo $chegadas['destinoNome'] ?></label>


                <label id="campoDirTit">TIPO DA VIAGEM</label>
                <label id="campoDirDados"><?php echo $dados['viagemTipo'] ?></label>


                <label id="campoEsqTit">HORA DE PARTIDA</label>
                <label id="campoEsqDados"><?php echo date('H:i', strtotime($dados['viagemIni'])); ?></label>


                <label id="campoEsqTit">SUPORTE TÉCNICO</label>
                <label id="campoEsqDados"><?php echo $dados['viagemTelefone']; ?></label>             

              </div>


              <div id="caixaEsquerdaViagens">
              
                <label id="campoDirTit">DESTINO DE PARTIDA</label>
                <label id="campoDirDados"><?php echo $dados['destinoNome'] ?></label>

                <label id="campoEsqTit">CLASSE DA VIAGEM</label>
                <label id="campoEsqDados"><?php echo $dados['viagemClasse'] ?></label>

                <label id="campoDirTit">HORA DE CHEGADA</label>
                <label id="campoDirDados"><?php echo date('H:i', strtotime($dados['viagemChegada'])); ?></label>

                <label id="campoDirTit">LUGARES DISPONIVEIS</label>
                <label id="campoDirDados">
                  <?php
                  if ($dados['viagemLugares'] == 0) { ?>
                      <font style="color:red;">LUGARES ESGOTADOS</font>
                    <?php
                  } else {
                    echo $dados['viagemLugares']; ?> Lugares</label><?php
                  } ?>

              </div>
            
            
            
          

      <?php if ($dados['viagemLugares'] != 0) { ?>
        <input type="button" value="Reserve já" class="btn btn-success" id="btnViagens">
    <?php
    botaoViagens($dados['viagemId'], $chegadas['destinoNome'], $dados['viagemPreco']);
      } else { ?>
      
          <input type="button" value="Voltar" class="btn btn-success" id="back" onclick="history.go(-1)/*Também Podia ser history.back()*/">

        <?php } ?>
            </div>

      <?php
}
function navBarViagem($id)
{
  global $con;

  $sql = "SELECT * FROM viagens INNER JOIN companhias ON viagemCompanhiaId = companhiaId
  INNER JOIN destinos ON viagemDestinoId = destinoId";
  $result = mysqli_query($con, $sql);
  $dados = mysqli_fetch_array($result);

  $sql = "SELECT * FROM destinos WHERE destinoId = {$dados['viagemChegadaDestinoId']}";
  $chegada = mysqli_query($con, $sql);
  $chegadas = mysqli_fetch_array($chegada);

  ?>
      <nav class="w-100" id="navBarTop">
        <a href="../SiteViagens/paginaPrincipal.php">
          <div id="logotipo"></div>
        </a>
        <label id="titulo">
          <font class="text-center">Destino: <?php echo $chegadas['destinoNome'] ?></font>
        </label>

        <?php
        menuNavBar();
        ?>
      </nav>
      <?php

}

