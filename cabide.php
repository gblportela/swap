<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cabide</title>

    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16pt;
            cursor: url('/assets/default.png'), default;
        }
        #foto{
            width: clamp(200px, 30vw, 600px);
            border-radius: 10px;
            box-shadow: 0 0 5px black;
        }
        #main{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .voltar{
            align-self: flex-start;
            margin: 10px;
        }
        a{
            text-decoration: none;
            color: #ab8762;
            padding: 3px;
        }
        a:hover{
            text-decoration: underline;

        }
        .cabecalho{
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f4f2f0;
            height: 50px;
            padding: 0 10px 0 10px;
            margin-bottom: 20px;
        }
        #infos{
            margin: 30px;
        }
    </style>
</head>
<?php 
    echo '
    <header class=cabecalho>
        <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a>
    </header>
    <a class=voltar href=http://'.$_SERVER['HTTP_HOST'].'/perfil.php>voltar</a>';
?>
<body>
    <section id="main">
        <?php 
        session_start();
        include('./conexao.php');
        if(!isset($_SESSION['login'])){
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
        }else{
            $usuario = $_SESSION['login'];
            $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
            $cpf = mysqli_fetch_assoc($query)['CPF'];
            
            $roupa = $_GET['roupa'];
            
            $query = mysqli_query($con, 'SELECT CODIGO FROM ANUNCIO WHERE CODIGOROUPA = '.$roupa.' AND CODIGOANUNCIANTE = "'.$cpf.'"');
            $result = mysqli_fetch_row($query);
            $query = mysqli_query($con, 'SELECT FOTO FROM ROUPA WHERE CODIGO = '.$roupa);
            $nomeFoto = mysqli_fetch_assoc($query);
            $status = $result ? 'em anúncio' : 'não anunciada';
            $aunciarOuNao = $result ? 'remover anúncio' : 'anunciar';
            echo "<img id='foto' src=/imagens/".$cpf."/".$nomeFoto['FOTO'].">
            <div class=infos>
            </div>
            <span>status da roupa: ".$status."</span>
            <div class=infos>
                <a href='http://".$_SERVER['HTTP_HOST']."/anunciando.php/?roupa=".$roupa."'>".$aunciarOuNao."</a>
                <a href='http://".$_SERVER['HTTP_HOST']."/removendofoto.php/?roupa=".$roupa."'>remover do armário</a>
            </div>
            ";
        }
    ?>
    </section>
</body>
</html>
