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

if(empty($localizacao) && empty($data)){
    echo "<script>alert('Entreii AQui');</script>";
    $sql="SELECT * FROM pacotes INNER JOIN viagens ON pacoteViagemId=viagemId INNER JOIN hoteis ON pacoteHotelId=hotelId  INNER JOIN destinos ON viagemChegadaDestinoId=destinoId
    WHERE hotelPreco + viagemPreco > $precoMin 
    AND hotelPreco + viagemPreco < $precoMax";
    $result = mysqli_query($con, $sql);

}else if(empty($data)){

    /*********************Sem Data******************************/
    
    echo "<script>alert('Sem data');</script>";
    $sql="SELECT destinoId FROM destinos WHERE destinoNome='$localizacao'";
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);

    $localizacaoId=$dados['destinoId'];

    echo "<br>Id da localizacao: ".$localizacaoId."<br>";

    $sql = "SELECT *
    FROM pacotes
    INNER JOIN viagens ON pacoteViagemId = viagemId
    INNER JOIN hoteis ON pacoteHotelId = hotelId INNER JOIN destinos ON viagemChegadaDestinoId=destinoId
    WHERE viagemChegadaDestinoId = '$localizacaoId'
    AND pacoteId IN (
        SELECT pacoteId
        FROM pacotes
        INNER JOIN hoteis ON pacoteHotelId = hotelId
        INNER JOIN viagens ON pacoteViagemId = viagemId
        WHERE hotelPreco + viagemPreco > $precoMin
        AND hotelPreco + viagemPreco < $precoMax
        )";
$result = mysqli_query($con, $sql);

}else if(empty($localizacao)){

        /************************Sem Localização********************************/
    echo "<script>alert('Sem Localização');</script>";
        $sql="SELECT destinoId FROM destinos WHERE destinoNome='$localizacao'";
        $result=mysqli_query($con,$sql);
        $dados=mysqli_fetch_array($result);

        $localizacaoId=$dados['destinoId'];

        echo "<br>Id da localizacao: ".$localizacaoId."<br>";

        $sql = "SELECT *
        FROM pacotes
        INNER JOIN viagens ON pacoteViagemId = viagemId
        INNER JOIN hoteis ON pacoteHotelId = hotelId INNER JOIN destinos ON viagemChegadaDestinoId=destinoId
        WHERE viagemData = '$data'
        AND pacoteId IN (
            SELECT pacoteId
            FROM pacotes
            INNER JOIN hoteis ON pacoteHotelId = hotelId
            INNER JOIN viagens ON pacoteViagemId = viagemId
            WHERE hotelPreco + viagemPreco > $precoMin
            AND hotelPreco + viagemPreco < $precoMax
            )";
    $result = mysqli_query($con, $sql);

}else{
    $sql="SELECT destinoId FROM destinos WHERE destinoNome='$localizacao'";
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);

    $localizacaoId=$dados['destinoId'];

    echo "<br>Id da localizacao: ".$localizacaoId."<br>";

    $sql = "SELECT *
    FROM pacotes
    INNER JOIN viagens ON pacoteViagemId = viagemId
    INNER JOIN hoteis ON pacoteHotelId = hotelId INNER JOIN destinos ON viagemChegadaDestinoId=destinoId
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
}

//echo $sql;
$pacotesEncontrados = array();
$totalPreco = array();

while ($dados = mysqli_fetch_array($result)) {
    $pacotesEncontrados[] = $dados;
    $totalPreco[]=$dados['hotelPreco']+$dados['viagemPreco'];
}

$_SESSION['pacotesEncontrados'] = $pacotesEncontrados;
$_SESSION['precoTotal'] = $totalPreco;

//print_r($_SESSION['pacotesEncontrados']);
//print_r($_SESSION['precoTotal']);
header("Location: pacotes.php");
exit();
