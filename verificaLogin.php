<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18pt;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
        }
    </style>
</head>
<body>

    <?php 
        include('conexao.php');
        if(isset($_POST['login']) && isset($_POST['senha'])){
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $query = mysqli_query($con, 'SELECT email, senha FROM pessoa WHERE email = "'.$login.'" and senha = "'.$senha.'"');
            if($result = mysqli_fetch_assoc($query)){
                header('Location: home.php');
                if($result['email'] == $login && $result['senha'] == $senha){
                    session_start();

                    $_SESSION['login'] = $login;
                    $_SESSION['senha'] = $senha;

                    header('Location: home.php');
                } else{
                    echo 'usuário ou senha inválido! <br>
                    tentar novamente <a href="login.php"></a>';
                }
            } else{
                echo 'usuário ou senha inválido! <br>
                <a href="login.php">tentar novamente </a>';
            }
        } 
    ?> 

</body>
</html>