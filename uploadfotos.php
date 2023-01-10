<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        <?php include "estilo.css" ?>
        *{
            border-collapse: collapse;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
        }
        h1{
            text-align: center;
        }
        body{
            min-height: 100vh;
        }
        #box{
            margin: auto;
            box-sizing: content-box;
        }
        input{
            border-radius: 5px;
            border: 1px solid #ccd0d5;
            outline: none;
            padding: 12px;
            margin: 5px;
            width: calc(100% - 10px);
        }
        .inputbox{
            display: flex;
            justify-content: space-between;
        }
        #box{
            overflow: auto;
            width: 400px;
            height: fit-content;
            border: 0px;
            box-shadow: 0 0 16px rgba(0, 0, 0, .3);
            border-radius: 10px;
            box-sizing: border-box;
            padding: 30px;
        }
        button{
            background-color: rgba(171, 135, 98);
            border: none;
            box-shadow: 0 0 2px black;
            color: white;
            border-radius: 4px;
            padding: 5px;
            margin: 5px;
            text-align: center;
            float: right;
        }
        button:hover{
            transform: scale(1.1);
        }
        
    </style>
</head>
<?php 
    echo '
    <header class=cabecalho>
        <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a>
    </header>';
?>
<body>
<main>
        <div id="box">  
            <h1>cadastrar roupa</h1>
            <form action="uploading.php" method="post" enctype="multipart/form-data">
            <div class="inputbox">
                imagem <input type="file" name="imagem" id="imagem-input">
            </div>
            <div class="inputbox">
                categoria <select name="categoria" id="categoria-input">
                    <option value="calça">calça</option>
                    <option value="sapato">sapato</option>
                    <option value="tênis">tênis</option>
                    <option value="blusa">blusa</option>
                    <option value="short">short</option>
                    <option value="sandalia">sandália</option>
                    <option value="casaco">casaco</option>
                </select>
            </div>
            <div class="inputbox">
                marca <input type="text" name="marca">
            </div>
            <div class="inputbox">
                condição <select name="condicao" id="condicao-input">
                    <option value="novo">novo</option>
                    <option value="semi-novo">semi-novo</option>
                    <option value="usado">usado</option>
                </select>
            </div>
            <div class="inputbox">
                cor <input type="text" name="cor">
            </div>
            <div class="inputbox">
                tamanho <input type="text" name="tamanho">
            </div>
            <div class="inputbox">
                genero <input type="text" name="genero">
            </div>
            <div class="inputbox">
                descrição <input type="text" name="descricao">
            </div>
            <div class="inputbox">
                <input type="submit" value="upar">
            </div>
    </form>
        </form>
        </div>
    </main>
    <?php
        echo '<a class="voltar" href=http://'.$_SERVER['HTTP_HOST'].'/perfil.php>voltar</a>';
    ?>
    
    <?php 
        
    ?>
</body>
</html>