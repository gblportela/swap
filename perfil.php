<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        h1{
            text-align: center;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .fotos-conteiner{
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header class=cabecalho>
    <a href="./home.php">início</a>
    <div>
        <a href="uploadfotos.php">upar fotos</a>
        <a href="ofertas.php">ofertas</a>
        <a href="relatorio.php">relatório</a>
        <a href="logout.php">logout</a>
    </div>
</header>
    <?php 
    include('conexao.php');
        session_start();
        if(!isset($_SESSION['login'])){
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
        }else{
            $usuario = $_SESSION['login'];
            $query = mysqli_query($con, 'SELECT CPF FROM PESSOA WHERE EMAIL = "'.$usuario.'"');
            $cpf = mysqli_fetch_assoc($query)['CPF'];
            
            $query = mysqli_query($con, 'SELECT CODIGO, FOTO FROM ROUPA WHERE CODPESSOA = "'.$cpf.'"');
            echo '<h1>suas roupinhas</h1>    
            <div class="fotos-conteiner">';
            while($row = mysqli_fetch_assoc($query)){
                    echo "<div class=photo-home><a href='cabide.php/?roupa=".$row['CODIGO']."'><img class='photo-armario' src='/imagens/".$cpf."/".$row['FOTO']."'></a></div>";
                }
                echo '</div>';   
        }
    ?>
    
</body>
</html>