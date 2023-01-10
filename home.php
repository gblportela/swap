<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swap</title>
    
    <style>
        <?php include "estilo.css" ?>
    </style>
</head>
<?php
    session_start();
    if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
        echo '  <header class="cabecalho">
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a> <a href="perfil.php">perfil</a>
                </header>';
    }else{
        echo '  <header class="cabecalho">
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a> <a href="login.php">login</a>
                </header>';
    }
?>
<body> 
    <?php 
        
        function imprimir_home(){
            include('conexao.php');
            $query = mysqli_query($con, "SELECT CODIGO, CODIGOROUPA, CODIGOANUNCIANTE FROM ANUNCIO");
            $rows = mysqli_num_rows($query);
            echo '<h1>roupinhas disponíveis</h1>';
            if($rows){
                echo '<div class="fotos-conteiner">
                ';
                while($row = mysqli_fetch_assoc($query)){
                        $nome = mysqli_query($con, "SELECT FOTO FROM ROUPA WHERE CODIGO = ".$row['CODIGOROUPA']);
                        $nome = mysqli_fetch_assoc($nome)['FOTO'];
                        echo "<div class=photo-home-div><a href='http://".$_SERVER['HTTP_HOST']."/olhando.php?anuncio=".$row['CODIGO']."'><img class='photo-armario' src='/imagens/".$row['CODIGOANUNCIANTE']."/".$nome."'></a></div>";
                    }
                    echo '</div>';
                } else{
                    echo '<p id=empty>nadinha disponível ainda "-"<p>';
                }
        }
        
        imprimir_home();
    ?>
</body>
</html>