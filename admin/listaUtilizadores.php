<?php
include_once("../php/backOffice.php");
global $con;
indexBO();
navBar();
drawTopBO();

$sql="select * from utilizadores";
$result=mysqli_query($con,$sql);

?>
<div class="p-2 mt-5" id="tabela">
    <h1>Lista de Utilizadores</h1>
    <table class="table table-dark table-striped">
        <tr>
            <td colspan="8"  id="cabeca">
                <a href="../signUp.php" class="btn-sm btn-success w-100" id="cabecaButton">NOVO UTILIZADOR</a>
            </td>
        </tr>
        <tr>
            <th class="text-center col-12 col-sm-1 align-middle" >
                Id
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Nome    
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Email
            </th>
            <th class="text-center col-12 col-sm-1 align-middle" style="height: 100px !important;">
                Imagem
            </th>
            <th class="text-center col-12 col-sm-1 align-middle">
                Idade
            </th>
            <th class="text-center col-12 col-sm-1 align-middle">
                Telefone
            </th>
            <th class="text-center col-12 col-sm-1 align-middle">
                Cargo
            </th>
            <th class="text-center col-12 col-sm-2 align-middle">
                Opções  
            </th>
        </tr>

        <?php

        while($dados=mysqli_fetch_array($result)){

            ?>
            <tr>
                <td class="text-center align-middle">
                    <?php echo $dados['utilizadorId'];?>
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['utilizadorNome'];?>
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['utilizadorEmail'];?>
                </td>
                <td class="text-center align-middle">
                    <img src="<?php echo $dados['utilizadorImagemURL'];?>" width="100" height="100">
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['utilizadorIdade'];?>
                </td>
                <td class="text-center align-middle">
                    <?php echo $dados['utilizadorTelefone'];?>
                <td class="text-center align-middle">
                    <?php echo $dados['utilizadorCargo'];?>
                </td>
                <td class="text-top">
                <form method="post">

                <!-- Formulário para editar -->
                <div class="w-100" id="editar">
                    <input type="hidden" name="id" value="<?php echo $dados['utilizadorId']; ?>">
                    <button formaction="editarUtilizador.php" type="submit"
                        class="btn btn-primary w-75 m-2">Editar</button>
                </div>

                <!-- Formulário para excluir -->
                <div class="w-100" id="eliminar">
                    <input type="hidden" name="id" value="<?php echo $dados['utilizadorId']; ?>">
                    <button formaction="eliminarUtilizador.php" type="submit"
                        class="btn btn-danger w-75 m-2">Eliminar</button>
                </div>

                </form>
</td>
            </tr>
            <?php
        }
        ?>
    </table>

</div>


<?php
drawBottomBO()
?>