<?php
include_once ("../php/backOffice.php");
global $con;



$id = intval($_POST['num']);

// Consulta para verificar se existem registros dependentes
$consulta_dependentes = "SELECT COUNT(*) AS num_dependentes FROM hoteis WHERE hotelConcelhoId = $id";

$resultado = mysqli_query($con, $consulta_dependentes);

$viagem = "SELECT COUNT(*) AS num_dependentesV FROM hoteis WHERE hotelConcelhoId = $id";

$result = mysqli_query($con, $viagem);

$monu = "SELECT COUNT(*) AS num_dependentesM FROM hoteis WHERE hotelConcelhoId = $id";

$resulta = mysqli_query($con, $monu);


$resta = "SELECT COUNT(*) AS num_dependentesR FROM hoteis WHERE hotelConcelhoId = $id";

$resultad = mysqli_query($con, $resta);


if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
    $num_dependentes = $row['num_dependentes'];

    if ($num_dependentes > 0) {
        // Existem registros dependentes, mostramos um alerta ao usuário
        echo "<script>alert('Não é possível excluir este campo, pois existe um hotel neste destino, tem de o eliminar'); window.location.href = 'listaHoteis.php';</script>";
    } else {
        // Não existem registros dependentes, então podemos prosseguir com a exclusão
        $sql = "DELETE FROM concelhos WHERE concelhoId = $id";
        mysqli_query($con, $sql);
        header("location:listaConcelhos.php");
    }
} else {
    // Tratar erro na consulta
    echo "Erro na consulta: " . mysqli_error($con);
}




if ($result) {
    $row = mysqli_fetch_assoc($result);
    $viagem = $row['num_dependentesV'];

    if ($viagem > 0) {
        // Existem registros dependentes, mostramos um alerta ao usuário
        echo "<script>alert('Não é possível excluir este campo, pois existe um hotel neste destino, tem de o eliminar'); window.location.href = 'listaViagens.php';</script>";
    } else {
        // Não existem registros dependentes, então podemos prosseguir com a exclusão
        $sql = "DELETE FROM concelhos WHERE concelhoId = $id";
        mysqli_query($con, $sql);
        header("location:listaConcelhos.php");
    }
} else {
    // Tratar erro na consulta
    echo "Erro na consulta: " . mysqli_error($con);
}




if ($resulta) {
    $row = mysqli_fetch_assoc($resulta);
    $monu = $row['num_dependentesM'];

    if ($monu > 0) {
        // Existem registros dependentes, mostramos um alerta ao usuário
        echo "<script>alert('Não é possível excluir este campo, pois existe um monumento neste destino, tem de o eliminar'); window.location.href = 'listaMonumentos.php';</script>";
    } else {
        // Não existem registros dependentes, então podemos prosseguir com a exclusão
        $sql = "DELETE FROM concelhos WHERE concelhoId = $id";
        mysqli_query($con, $sql);
        header("location:listaConcelhoos.php");
    }
} else {
    // Tratar erro na consulta
    echo "Erro na consulta: " . mysqli_error($con);
}



if ($resultad) {
    $row = mysqli_fetch_assoc($resultad);
    $resta = $row['num_dependentesR'];

    if ($resta > 0) {
        // Existem registros dependentes, mostramos um alerta ao usuário
        echo "<script>alert('Não é possível excluir este campo, pois existe um restaurante neste destino, tem de o eliminar'); window.location.href = 'listaRestaurantes.php';</script>";
    } else {
        // Não existem registros dependentes, então podemos prosseguir com a exclusão
        $sql = "DELETE FROM concelhos WHERE concelhoId = $id";
        mysqli_query($con, $sql);
        header("location:listaConcelhoos.php");
    }
} else {
    // Tratar erro na consulta
    echo "Erro na consulta: " . mysqli_error($con);
}
?>