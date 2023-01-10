<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>relatório</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<style>
    #content{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    tr, td, thead{
        border: solid 1px black;
    }
    tr, td, thead{
        padding: 5px;
    }
    table{
        margin-bottom: 2px;
    }
</style>
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
    
    <div id="content">
        <?php 
            include('conexao.php');
            if(!isset($_SESSION['login'])){
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/home.php');
            }else{
                $usuario = $_SESSION['login'];
                
                echo '
                <form action="relatorio.php" method="POST">
                    trocas entre <input type="date" name="datainicio" id="datainicio"> e <input type="date" name="datafim" id="datafim">
                    <button>submit</button>
                </form>';
                
                $cpf = mysqli_query($con, "SELECT CPF FROM PESSOA WHERE EMAIL = '".$usuario."'");
                $cpf = mysqli_fetch_assoc($cpf);
                if(isset($_POST['datainicio']) && isset($_POST['datafim'])){
                    $query = mysqli_query($con, "SELECT * FROM TROCA WHERE CODIGOINTERESSADO = '".$cpf['CPF']."' OR CODIGOANUNCIANTE = '".$cpf['CPF']."' AND DATA_TROCA BETWEEN '".$_POST['datainicio']."' AND '".$_POST['datafim']."'");
                } else{
                    $query = mysqli_query($con, "SELECT * FROM TROCA WHERE CODIGOINTERESSADO = '".$cpf['CPF']."' OR CODIGOANUNCIANTE = '".$cpf['CPF']."'");
                }
                echo '<table>
                            <thead>
                                <tr>
                                    <td>
                                        nome do anunciante
                                    </td>
                                    <td>
                                        nome do recebedor
                                    </td>
                                    <td>
                                        código do anunciante
                                    </td>
                                    <td>
                                        código do recebedor
                                    </td>
                                    <td>
                                        codigo sua roupa
                                    </td>
                                    <td>
                                        codigo roupa do trocador
                                    </td>
                                    <td>
                                        data da troca    
                                    </td>
                                </tr>
                            </thead>';
                while($row = mysqli_fetch_assoc($query)){
                    $nomeAnunciante = mysqli_query($con, "SELECT NOME FROM PESSOA WHERE CPF = '".$row['codigoAnunciante']."'");
                    $nomeAnunciante = mysqli_fetch_assoc($nomeAnunciante);
                    $nomeRecebedor = mysqli_query($con, "SELECT NOME FROM PESSOA WHERE CPF = '".$row['codigoInteressado']."'");
                    $nomeRecebedor = mysqli_fetch_assoc($nomeRecebedor);
                    echo '
                            <tbody>
                                    <tr>
                                    <td>'.$nomeAnunciante['NOME'].'</td>
                                    <td>'.$nomeRecebedor['NOME'].'</td>
                                    <td>'.$row['codigoAnunciante'].'</td>
                                    <td>'.$row['codigoInteressado'].'</td>
                                    <td>'.$row['roupaAnunciante'].'</td>
                                    <td>'.$row['roupaInteressado'].'</td>
                                    <td>'.$row['data_troca'].'</td>
                                    </tr>
                            </tbody>
                        ';
                    }
                    echo '</table>';             
            }
        ?>
    </div>
</body>
</html>