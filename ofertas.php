<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ofertas</title>
    <style>
        <?php include "estilo.css" ?>
        .foto{
            width: clamp(100px, 10vw, 250px);
            box-shadow: 0 0 2px #060c13;
            border-radius: 5px;
            position: relative;
            top: 0
        }
        .foto:hover{
            top:-4px;box-shadow:0 4px 4px #999999;
            transition: all .2s ease-in-out
        }
        .foto-oferta-div{
            margin: 10px 10px 10px 10px;
        }
        .ofertar-button{
            background-color: rgba(171, 135, 98);
            box-shadow: 0 0 3px black;
            color: white;
            border-radius: 4px;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<header class=cabecalho>
    <a href="./home.php">início</a>
    <div>
        <a href="perfil.php">perfil</a>
    </div>
</header>
<body>
    <?php
        session_start();
        include('conexao.php');
        if(!isset($_SESSION['login'])){
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
        }else{
            $usuario = $_SESSION['login'];
            $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
            $cpf = mysqli_fetch_assoc($query)['CPF'];

            $query = mysqli_query($con, "SELECT * FROM OFERTA WHERE CODIGOANUNCIANTE = '".$cpf."'");
            while($row = mysqli_fetch_assoc($query)){
                $nomeFotoAnunciante = mysqli_query($con, "SELECT FOTO FROM ROUPA WHERE CODIGO = ".$row['codigoRoupaAnunciante']);
                $nomeFotoAnunciante = mysqli_fetch_assoc($nomeFotoAnunciante)['FOTO'];
                $nomeFotoInteressado = mysqli_query($con, "SELECT FOTO FROM ROUPA WHERE CODIGO = ".$row['codigoRoupaInteressado']);
                $nomeFotoInteressado = mysqli_fetch_assoc($nomeFotoInteressado)['FOTO'];

                echo "  <div class='foto-oferta-div'>
                            <img class='foto' src='/imagens/".$row['codigoAnunciante']."/".$nomeFotoAnunciante."'> x
                            <img class='foto' src='/imagens/".$row['codigoInteressado']."/".$nomeFotoInteressado."'>
                            <a class='ofertar-button' href='http://".$_SERVER['HTTP_HOST']."/fechandooferta.php/?o=".$row['codigo']."'>fechar oferta</a>
                        </div> <hr>";
            }
        }
    ?>
</body>
</html>