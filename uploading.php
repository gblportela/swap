<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['login'])){
            header('Location: ./home.php');
        }else{
            
            $usuario = $_SESSION['login'];
            include('conexao.php');
            $query = mysqli_query($con, "SELECT cpf FROM PESSOA WHERE EMAIL = '".$usuario."'");
            $result = mysqli_fetch_assoc($query);
            
            if(isset($_FILES['imagem'])){
                $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
                $new_name = date("Y.m.d-H.i.s").$ext; //Definindo um novo nome para o arquivo
                $dir = './imagens/'.$result['cpf'].'/'; //Diretório para uploads 
                
                if(!file_exists('./imagens/'.$result['cpf'])){
                    mkdir($dir, 0777, true);
                }
                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name)){
                    header('location: ./perfil.php');
                    mysqli_query($con, "INSERT INTO ROUPA (categoria, marca, condicao, cor, tam, gen, descricao, codPessoa, foto)
                    values ('".$_POST['categoria']."', '".$_POST['marca']."', '".$_POST['condicao']."', '".$_POST['cor']."', '".$_POST['tamanho']."', '".$_POST['genero']."', '".$_POST['descricao']."',  '".$result['cpf']."', '".$new_name."');
                    "); 
                } else{
                    echo("Imagem não enviada!<br>
                    <a href='./uploadfotos.php'>tentar novamente</a>");
                }
            } 
              
    }

    ?>
</body>
</html>