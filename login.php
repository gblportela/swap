<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>

    <style>
        <?php include "estilo.css" ?>
        *{
            border-collapse: collapse;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            margin: 0;
            padding: 0;
        }
        h1{
            text-align: center;
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
            padding: 7px;
            margin: 5px;
            text-align: center;
            float: right;
        }
        button:hover{
            transform: scale(1.1);
        }
        #cadastro{
            display: inline-block;
            margin: 10px;
        }
    </style>
</head>
<?php
    echo '  <header class="cabecalho">
            <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a>
            </header>';
?>
<body>
    <main>
        <div id="box">  
            <h1>login</h1>
            <form action="verificaLogin.php" method="post">
                <input type="text" name="login" id="login" placeholder="login">
                <input type="text" name="senha" id="senha" placeholder="senha">
                <a id="cadastro" href="cadastro.php">fazer cadastro</a>
            <button type="submit">entrar</button>
            </form>
        </div>
    </main>
</body>
</html>