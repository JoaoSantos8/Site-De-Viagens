<?php
include_once ("../php/backOffice.php");
global $con;


$id=intval($_POST['num']);
$nome=addslashes($_POST['nome']);
$descricao=addslashes($_POST['descricao']);
$telefone=addslashes($_POST['telefone']);
$preco=addslashes($_POST['preco']);
$urlImagem=addslashes($_POST['imagem']);
$destino=addslashes($_POST['destino']);

if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $upload_dir = 'images/restaurantes/'; // change this to the destination folder
        $file_name = $_FILES['image']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif'); // add or remove file extensions that you want to allow
        if(in_array($file_ext, $allowed_ext)){
            // generate a unique filename to avoid overwriting existing files
            $new_file_name = uniqid('', true) . '.' . $file_ext;
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            if(move_uploaded_file($file_tmp, $upload_dir.$new_file_name)){
                // image uploaded successfully, store the link in a variable
                $image_link = $upload_dir . $new_file_name;
                
                
            }else{
                echo "Error uploading file.";
            }
        }else{
            echo "Invalid file type.";
        }
    }
    
    if($image_link!= ""){
    $urlImagem=$image_link;
    }

$sql = "SELECT * from concelhos WHERE concelhoNome='$destino'";
$result = mysqli_query($con, $sql);
$dados = mysqli_fetch_array($result);

$destino=$dados['concelhoId'];


        //echo "<script>alert('Entreiii aqui again $urlImagem')</script>";
        //$i++;
        $sql="UPDATE restaurantes set restauranteNome='$nome', restauranteImagemURL='$urlImagem', restauranteDescricao='$descricao', restauranteTelefone='$telefone', restaurantePreco='$preco', restauranteConcelhoId='$destino' where restauranteId='$id'";
        //echo $sql;
        mysqli_query($con,$sql);
        header("location:listaRestaurantes.php");


?>