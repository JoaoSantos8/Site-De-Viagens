<?php 
include_once ("php/frontOffice.php");
session_start();
global $con;

$localizacao = addslashes($_POST['localizacao']);
$data = addslashes($_POST['data']);
$precoMin = addslashes($_POST['precoMin']);
$precoMax = addslashes($_POST['precoMax']);

echo "Aqui Seus Valores";
echo "<br>Localização: ".$localizacao;
echo "<br>Data: ".$data;
echo "<br>Minimo: ".$precoMin;
echo "<br>Maximo: ".$precoMax;

$sql="SELECT destinoId FROM destinos WHERE destinoNome='$localizacao'";
echo $sql;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

$localizacaoId=$dados['destinoId'];

echo "<br>Id da localizacao: ".$localizacaoId;
echo "<br>Nome de utilizador: ".$_SESSION['utilizadorNome'];

$sql = "SELECT pacoteNome 
        FROM pacotes 
        INNER JOIN viagens ON pacoteViagemId = viagemId 
        WHERE viagemChegadaDestinoId = '$localizacaoId'
        AND viagemData = '$data'
        AND pacoteId IN (
            SELECT pacoteId 
            FROM pacotes 
            INNER JOIN hoteis ON pacoteHotelId = hotelId 
            INNER JOIN viagens ON pacoteViagemId = viagemId 
            WHERE hotelPreco + viagemPreco > $precoMin 
            AND hotelPreco + viagemPreco < $precoMax
        )";
$result = mysqli_query($con, $sql);

$pacotesEncontrados = array();

while ($dados = mysqli_fetch_array($result)) {
    $pacotesEncontrados[] = $dados['pacoteNome'];
}

$_SESSION['pacotesEncontrados'] = $pacotesEncontrados;

print_r($_SESSION['pacotesEncontrados']);

header("Location: pacotes.php");
exit();
