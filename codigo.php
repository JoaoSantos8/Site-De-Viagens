<?php
/***************Pesquisa  *********/

if (isset($_GET['q']) && !empty($_GET['q'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['q']);
    $sql = "SELECT * FROM concelhos INNER JOIN destinos ON concelhoDestinoId = destinoId WHERE concelhoNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
}

?>
<div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Pesquisar..." value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
</div>

<?php 

if (isset($_GET['escrevo']) && !empty($_GET['escrevo'])) {
    $termoPesquisa = mysqli_real_escape_string($con, $_GET['escrevo']);
    $sql = "SELECT * FROM viagens INNER JOIN companhias ON viagemCompanhiaId = companhiaId WHERE companhiaNome LIKE '%$termoPesquisa%'";
    $result = mysqli_query($con, $sql);
} else {
    $sql = "SELECT * FROM viagens INNER JOIN companhias ON viagemCompanhiaId = companhiaId
    INNER JOIN destinos ON viagemDestinoId = destinoId
    ";
    $result = mysqli_query($con, $sql);
}
?>