<?php 
    include('conexao.php');

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    $cep = isset($_POST['cep']) ? $_POST['cep'] : null;

    mysqli_query($con, "INSERT INTO PESSOA (cpf, email, senha, nome, telefone, bairro, cidade, estado) 
    VALUES ('".$cpf."', '".$email."', '".$senha."', '".$nome."', '".$telefone."', '".$bairro."', '".$cidade."', '".$estado."')");

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/login.php');
?>