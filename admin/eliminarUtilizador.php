<?php
include_once("../php/backOffice.php");
global $con;

$id=intval($_POST['id']);

indexBO();
navBar();
drawTopBO();
$sql="select * from utilizadores where utilizadorId='$id'";
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
?>
<div class="w-75 p-5 m-5">
        <h1>Eliminar Utilizador</h1>
        <form class="p-5 mt-5" action="confirmarEliminaUtilizador.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="mb-3">
                <label for="nomeUtilizador" class="form-label labelNome">NOME</label><p>
                <input type="text" disabled name="nome" value="<?php echo $dados['utilizadorNome'] ?>">
            </div>

            <div class="mb-3">
                <label for="emailUtilizador" class="form-label">EMAIL</label><p>
                <input type="email" disabled name="email" value="<?php echo $dados['utilizadorEmail'] ?>">
            </div>

            <div class="mb-3">
                <label for="idadeUtilizador" class="form-label">IDADE</label><p>
                <input type="number" disabled name="idade" value="<?php echo $dados['utilizadorIdade'] ?>">
            </div>
            
            <div class="mb-3">
                <label for="telefoneUtilizador" class="form-label">TELEFONE</label><p>
                <input type="tel" disabled name="telefone" class="mb-3" value="<?php echo $dados['utilizadorTelefone'] ?>">
            </div>

            <div id="image">
        <label id="">UTILIZADOR - IMAGEM</label><br>
        <img src="../admin/<?php echo $dados['utilizadorImagemURL'] ?>" alt="" id="ima" width="200px" height="200px" class="mb-3">
            
        </div>

            <div class="mb-3">
                <input type="text" hidden name="num" value=<?php echo $id ?>>
                <input type="submit" class="btn btn-danger p-3" value="CONFIRMAR">
            </div>
        </form>
    </div>

    
<?php
drawBottomBO()
?>