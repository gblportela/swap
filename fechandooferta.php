<?php
    include('conexao.php');
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
    }else{
        $usuario = $_SESSION['login'];
        $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
        $cpf = mysqli_fetch_assoc($query)['CPF'];

        $oferta = $_GET['o'];
        
        $query = mysqli_query($con, "SELECT * FROM OFERTA WHERE CODIGO = ".$oferta);
        $oferta = mysqli_fetch_assoc($query);
        mysqli_query($con, "DELETE FROM ANUNCIO WHERE CODIGO = ".$oferta['codigoAnuncio']);
        mysqli_query($con, "DELETE FROM OFERTA WHERE CODIGO = ".$oferta['codigo']);


        $data_troca = date("Y-m-d");
        
        mysqli_query($con, "INSERT INTO TROCA (codigoInteressado, codigoAnunciante, roupaAnunciante, roupaInteressado, data_troca) 
        VALUES ('".$oferta['codigoInteressado']."', '".$cpf."', ".$oferta['codigoRoupaAnunciante'].", ".$oferta['codigoRoupaInteressado'].", '".$data_troca."')");

        header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
    }
?>