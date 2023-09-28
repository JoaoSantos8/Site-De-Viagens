<?php
include_once ("../php/backOffice.php");
global $con;


$id=intval($_POST['num']);
$nome=addslashes($_POST['nome']);
$idade=addslashes($_POST['idade']);
$telefone=addslashes($_POST['telefone']);
$email=addslashes($_POST['email']);
$escalao=addslashes($_POST['cargo']);
$urlImagem=addslashes($_POST['imagem']);

//$i=0;

if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
    $upload_dir = 'images/Utilizadores/'; // change this to the destination folder
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
if($escalao==""){
    
    $sql="select utilizadorCargo from utilizadores where utilizadorId='$id'";
    $result=mysqli_query($con,$sql);
    $dados=mysqli_fetch_array($result);
    $escalao=$dados["utilizadorCargo"];
}

        //$i++;
        //echo "<script>alert('Entreiii aqui again $i')</script>";
        $sql="Update utilizadores set utilizadorNome='$nome', utilizadorEmail='$email', utilizadorImagemURL='$urlImagem', utilizadorIdade='$idade', utilizadorTelefone='$telefone', utilizadorCargo='$escalao' where utilizadorId='$id'";
        //echo $sql;
        mysqli_query($con,$sql);
        header("location:listaUtilizadores.php");


?>