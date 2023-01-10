<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>anunciando</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php 
    include('./conexao.php');
    session_start();
        $roupa = isset($_GET['roupa']) ? $_GET['roupa'] : null;
        
        if(!$roupa){
           echo 'roupa inexistente &#x1F928 <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a>';
        } else{

            $usuario = $_SESSION['login'];
            $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
            $cpf = mysqli_fetch_assoc($query)['CPF'];
            
            $query = mysqli_query($con, 'SELECT CODIGO FROM ANUNCIO WHERE CODIGOROUPA = '.$roupa);
            $result = mysqli_fetch_row($query);
            
            $query = mysqli_query($con, 'SELECT CODIGO FROM ROUPA WHERE CODIGO = '.$roupa);
            $possuiRoupa = mysqli_fetch_row($query);
            
            if($result){
                $query = mysqli_query($con, 'DELETE FROM ANUNCIO WHERE CODIGOROUPA AND CODIGOANUNCIANTE = '.$cpf);
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/perfil.php');
            } else{
                $query = mysqli_query($con, 'INSERT INTO ANUNCIO (CODIGOANUNCIANTE, CODIGOROUPA) VALUES ("'.$cpf.'", '.$roupa.')');
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/perfil.php');
            }   
        }
    ?>
</body>
</html>