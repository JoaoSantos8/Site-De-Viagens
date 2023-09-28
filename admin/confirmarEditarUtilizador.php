<?php
include_once ("../php/backOffice.php");
global $con;


$id=$_SESSION['utilizadorId'];
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

$_SESSION['utilizadorNome'] = $nome;
if($escalao!=""){
    $_SESSION['utilizadorCargo'] = $escalao;
}else{
    $escalao=$_SESSION['utilizadorCargo'];
}
$_SESSION['utilizadorEmail'] = $email;
$_SESSION['utilizadorIdade'] = $idade;
$_SESSION['utilizadorTelefone'] = $telefone;

if($urlImagem!=""){
    $_SESSION['utilizadorImagemURL'] = $urlImagem;
}else{
    $urlImagem=$_SESSION['utilizadorImagemURL'];
}



        //$i++;
        //echo "<script>alert('Entreiii aqui again $i')</script>";
        $sql="Update utilizadores set utilizadorNome='$nome', utilizadorEmail='$email', utilizadorImagemURL='$urlImagem', utilizadorIdade='$idade', utilizadorTelefone='$telefone', utilizadorCargo='$escalao' where utilizadorId='$id'";
        //echo $sql;
        mysqli_query($con,$sql);
        if($escalao!="Utilizador"){
        header("location:index.php");
        }else{
            header("location:../paginaPrincipal.php");
        }


?>