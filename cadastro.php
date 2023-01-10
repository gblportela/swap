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
<body>
    <?php
    echo '  <header class="cabecalho">
            <a href="http://'.$_SERVER['HTTP_HOST'].'/home.php">início</a>
        </header>';
    ?>
    <main>
        <div id="box">  
            <h1>cadastro</h1>
            <form action="cadastrando.php" method="post">
                <div class="inputbox">
                    <input type="text" name="nome" id="nome" placeholder="nome" required>
                    <input type="text" name="sobrenome" id="sobrenome" placeholder="sobrenome" required>
                </div>
                
                <input type="text" name="email" id="email" placeholder="email" required>
                <input type="text" name="senha" id="senha" placeholder="senha" required>
                
                <div class='inputbox'>
                    <input type="text" name="cpf" id="cpf" placeholder="cpf" required>
                    <input type="text" name="telefone" id="telefone" placeholder="telefone" required>
            </div>
            <div>
                <div class="inputbox">
                    <input type="text" name="bairro" id="bairro" placeholder="bairro" required>
                    <input type="text" name="cidade" id="cidade" placeholder="cidade" required>
                </div>
                <div class=inputbox>
                    <input type="text" name="estado" id="estado" placeholder="estado" required>
                    <input type="text" name="cep" id="cep" placeholder="cep" required>
                </div>
            </div>
            <button type="submit">cadastrar</button>
        </form>
        </div>
    </main>
</body>
</html>