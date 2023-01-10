<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>olhando...</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        
        #foto{
            width: clamp(300px, 40vw, 600px);
            border-radius: 10px;
            box-shadow: 0 0 5px black;
        }
        #main{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
        .blocodireita{
            display: flex;
            flex-direction: column;
            justify-items: stretch;
        }
        .blocodireita > *{
            margin: 10px;
        }
        #main > *{
            margin: 10px;
        }
        .ofertar-button{
            background-color: rgba(171, 135, 98);
            box-shadow: 0 0 3px black;
            color: white;
            border-radius: 4px;
            padding: 5px;
            width: calc(100% - 20px);
            text-align: center;
        }
        .voltar{
            align-self: flex-start;
        }
        #grid-area1{
            display: grid;
            border: 1px solid #f4f2f0;
            box-shadow: 0 0 2px #f4f2f0;
            border-radius: 3px;
            grid-template-areas:
            "tamanho tamanho tamanho"
            "condicao marca genero"
        }
        #grid-area1 > div{
            margin: 5px;
            text-align: center;
        }
        .grid-area2{
            border: 1px solid #f4f2f0;
            box-shadow: 0 0 2px #f4f2f0;
            border-radius: 3px;
        }
        .grid-area2 > *{
            
            text-align: center;
        }
        h1{
            color: #ab8762
        }
        #tamanho{
            grid-area: tamanho;
        }
        #condicao{
            grid-area: condicao;
        }
        #marca{
            grid-area: marca;
        }
        #genero{
            grid-area: genero;
        }

    </style>
</head>

<?php
    include('conexao.php');
    session_start();
    $login = false;

    if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
        echo '  <header class="cabecalho">
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a> <a href="perfil.php">perfil</a>
                </header>';
                $login = true;
    }else{
        echo '  <header class="cabecalho">
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a> <a href="login.php">login</a>
                </header>';
    }
?>

<body>
    <section id=main>
        <?php 
        $anuncio = isset($_GET['anuncio']) ? $_GET['anuncio'] : null;
        if(!$anuncio){
            echo 'roupa não encontrada <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">voltar para o início</a>';
        } else{
            
            
            $query = mysqli_query($con, "SELECT CODIGOROUPA, CODIGOANUNCIANTE FROM ANUNCIO WHERE CODIGO =".$anuncio);
            $result = mysqli_fetch_assoc($query);
            
            $roupa = mysqli_query($con, "SELECT CODIGO, MARCA, TAM, CONDICAO, GEN, DESCRICAO, FOTO FROM ROUPA WHERE CODIGO = ".$result['CODIGOROUPA']);
            $roupa = mysqli_fetch_assoc($roupa);
            
            echo "<img id='foto' src=/imagens/".$result['CODIGOANUNCIANTE']."/".$roupa['FOTO'].">
                <section class='blocodireita'>
            ";
            if($login){
                $usuario = isset($_SESSION['login']) ? $_SESSION['login'] : null;
                $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
                $cpf = mysqli_fetch_assoc($query)['CPF'];
                
                if($result['CODIGOANUNCIANTE'] == $cpf){
                    echo '<a class="ofertar-button" href="http://'.$_SERVER['HTTP_HOST'].'/cabide.php?roupa='.$roupa['CODIGO'].'">ver no cabide</a>';
                } else if($login){
                    echo '<a class="ofertar-button" href="http://'.$_SERVER['HTTP_HOST'].'/ofertar.php?anuncio='.$anuncio.'">fazer oferta</a>';
                } 
                
            } else{ echo '<a href="login.php">faça login para fazer uma oferta</a>';
            
            }
            echo "  <section id='grid-area1'>
                        <div id='tamanho'>
                            <h1>tamanho</h1>
                            <p>".$roupa['TAM']."</p>
                        </div>
                        <div id='marca'>
                            <h1>marca</h1>
                            <p>".$roupa['MARCA']."</p>
                        </div>
                        <div id='condicao'>
                            <h1>condição</h1>
                            <p>".$roupa['CONDICAO']."</p>
                        </div>
                        <div id='genero'>
                            <h1>gênero</h1>
                            <p>".$roupa['GEN']."</p>
                        </div>
                    </section>
                    <section class='grid-area2'>
                        <div id='genero'>
                            <h1>descrição</h1>
                            <p>".$roupa['GEN']."</p>
                        </div>
                    </section>
                </section>";
            }
            
        ?>
        </section>
</body>
</html>