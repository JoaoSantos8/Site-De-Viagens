<?php
include_once ("../php/backOffice.php");
global $con;


$id=intval($_POST['num']);
$urlImagem=addslashes($_POST['imagem']);
$nome=addslashes($_POST['nome']);
$descricao=addslashes($_POST['descricao']);
$destino=addslashes($_POST['destino']);

//$i=0;

if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
    $upload_dir = 'images/concelhos/'; // change this to the destination folder
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

$sql="select * from destinos where destinoNome='$destino'";
$result=mysqli_query($con,$sql);
$dados= mysqli_fetch_array($result);
$destino=$dados['destinoId'];
        //echo "<script>alert('Entreiii aqui again $urlImagem')</script>";
        //$i++;
        $sql="Update concelhos set concelhoNome='$nome', concelhoImagemURL='$urlImagem', concelhoDescricao='$descricao', concelhoDestinoId='$destino' where concelhoId='$id'";
        //echo $sql;
        mysqli_query($con,$sql);
        header("location:listaConcelhos.php");


?>