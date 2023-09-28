<?php
include_once ("../php/backOffice.php");
global $con;


$id = intval($_POST['num']);

// Consulta para verificar se existem registros dependentes
$consulta_dependentes = "SELECT COUNT(*) AS num_dependentes FROM concelhos WHERE concelhoDestinoId = $id";

$resultado = mysqli_query($con, $consulta_dependentes);

if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
    $num_dependentes = $row['num_dependentes'];

    if ($num_dependentes > 0) {
        // Existem registros dependentes, mostramos um alerta ao usuário
        echo "<script>alert('Não é possível excluir este campo, pois existe um concelho neste destino, tem de o eliminar'); window.location.href = 'listaConcelhos.php';</script>";
    } else {
        // Não existem registros dependentes, então podemos prosseguir com a exclusão
        $sql = "DELETE FROM destinos WHERE destinoId = $id";
        mysqli_query($con, $sql);
        header("location:listaDestinos.php");
    }
} else {
    // Tratar erro na consulta
    echo "Erro na consulta: " . mysqli_error($con);
}
?>