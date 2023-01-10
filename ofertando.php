<?php 
    session_start();
    include('conexao.php');
    if(!isset($_SESSION['login'])){
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
    }else{
        $usuario = $_SESSION['login'];
        $anuncio = $_GET['a'];
        $roupaInteressado = $_GET['r'];

        $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
        $cpfInteressado = mysqli_fetch_assoc($query)['CPF'];

        $query = mysqli_query($con, "SELECT CODIGO, CODIGOANUNCIANTE, CODIGOROUPA FROM ANUNCIO WHERE CODIGO = ".$anuncio);
        $anuncio = mysqli_fetch_assoc($query);
        $query = mysqli_query($con, "INSERT INTO OFERTA (codigoAnuncio, codigoAnunciante, codigoInteressado, codigoRoupaInteressado, codigoRoupaAnunciante)
        VALUES (".$anuncio['CODIGO'].", '".$anuncio['CODIGOANUNCIANTE']."', '".$cpfInteressado."',".$roupaInteressado.",".$anuncio['CODIGOROUPA'].")");

        header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
    }
?>