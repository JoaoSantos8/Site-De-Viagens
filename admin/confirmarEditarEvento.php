<?php
include_once ("../php/backOffice.php");
global $con;


$id=intval($_POST['num']);
$urlImagem=addslashes($_POST['imagem']);
$nome=addslashes($_POST['nome']);
$descricao=addslashes($_POST['descricao']);
$email=addslashes($_POST['email']);
$dataC=addslashes($_POST['dataC']);
$dataA=addslashes($_POST['dataA']);
$preco=addslashes($_POST['preco']);
$destino=addslashes($_POST['destino']);
$tipo=addslashes($_POST['tipo']);

echo $urlImagem;
//$i=0;

if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
    $upload_dir = 'images/atividades/'; // change this to the destination folder
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

$sql="select * from concelhos where concelhoNome='$destino'";
$result=mysqli_query($con,$sql);
$dados= mysqli_fetch_array($result);
$destino=$dados['concelhoId'];



        //echo "<script>alert('Entreiii aqui again $urlImagem')</script>";
        //$i++;
        $sql="Update eventos set eventoNome='$nome', eventoImagemURL='$urlImagem', eventoDescricao='$descricao', eventoEmail='$email', eventoDataC='$dataC', eventoDataA='$dataA', eventoPreco='$preco', eventoTipo='$tipo', eventoConcelhoId='$destino' where eventoId='$id'";
        echo $sql;
        //mysqli_query($con,$sql);
        //header("location:listaEventos.php");


?>