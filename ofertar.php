<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ofertar</title>
    <style>
        <?php include "estilo.css" ?>
        .foto{
            width: clamp(100px, 10vw, 200px);
        }
        #ofertar-button{
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
        <a href="uploadfotos.php">upar fotos</a>
        <a href="ofertas.php">ofertas</a>
        <a href="logout.php">logout</a>
    </div>
</header>
<body>

    <?php
        session_start();
        include('conexao.php');
        if(!isset($_SESSION['login'])){
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
        }else{
            $anuncio = isset($_GET['anuncio']) ? $_GET['anuncio'] : null; 
            
            $usuario = $_SESSION['login'];
            $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
            $cpfInteressado = mysqli_fetch_assoc($query)['CPF'];
            
            $query = mysqli_query($con, "SELECT CODIGO, CODIGOANUNCIANTE, CODIGOROUPA FROM ANUNCIO WHERE CODIGO = ".$anuncio);
            $anuncio = mysqli_fetch_assoc($query);
            
            $query = mysqli_query($con, "SELECT CODIGO, FOTO FROM ROUPA WHERE CODPESSOA = '".$cpfInteressado."'");
            $numrows = mysqli_num_rows($query);
            echo "
            <section>";
                if($numrows){
                    while($roupas = mysqli_fetch_array($query)) {
                        echo "<div class='foto-oferta-div'>
                        <img class='foto' src='/imagens/".$cpfInteressado."/".$roupas['FOTO']."'>
                        <a id='ofertar-button' href='http://".$_SERVER['HTTP_HOST']."/ofertando.php/?a=".$anuncio['CODIGO']."&r=".$roupas['CODIGO']."'>ofertar</a>
                        </div>";
                    }
                } else{
                    echo "adicione roupas ao seu armário para fazer ofertas! ";
                }
            echo "</section>";
        }
    ?>    
</body>
</html>