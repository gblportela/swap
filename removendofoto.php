<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        include('conexao.php');
        if(!isset($_SESSION['login'])){
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
        }else{
            $roupa = $_GET['roupa'];
            $usuario = $_SESSION['login'];
            $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
            $cpf = mysqli_fetch_assoc($query)['CPF'];
            
            $query = mysqli_query($con, "DELETE FROM ANUNCIO WHERE CODIGOROUPA = ".$roupa." AND CODIGOANUNCIANTE = '".$cpf."'");
            $query = mysqli_query($con, "DELETE FROM ROUPA WHERE CODIGO = ".$roupa." AND CODPESSOA = '".$cpf."'");
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/perfil.php');
        }
    ?>
</body>
</html>