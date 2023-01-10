<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include('conexao.php');

        mysqli_query($con, "CREATE TABLE IF NOT EXISTS pessoa(
            cpf varchar(11) primary key, 
            email varchar(30) not null,
            senha varchar(30) not null,
            nome varchar(30) not null,
            telefone varchar(11) not null,
            bairro varchar(30) not null,
            cidade varchar(30) not null,
            estado varchar(30) not null) ENGINE=MyISAM;"
        );
        
        mysqli_query($con, "CREATE TABLE IF NOT EXISTS roupa (
            codigo int primary key AUTO_INCREMENT,
            categoria varchar(50) not null,
            marca varchar(50),
            condicao varchar(50),
            cor varchar(30),
            tam char(3),
            gen varchar(20),
            descricao varchar(1000),
            codPessoa varchar(11) not null,
            foto varchar(30) not null,
            foreign key (codPessoa) references pessoa(cpf)) ENGINE=MyISAM;"
        );
        
        mysqli_query($con, "CREATE TABLE IF NOT EXISTS anuncio(
            codigo int primary key AUTO_INCREMENT,
            codigoAnunciante varchar(11) not null,
            codigoRoupa int not null,
            foreign key (codigoRoupa) references roupa (codigo),
            foreign key (codigoAnunciante) references pessoa (cpf)) ENGINE=MyISAM;"
        );
        mysqli_query($con, "CREATE TABLE IF NOT EXISTS oferta(
            codigo int primary key AUTO_INCREMENT,
            codigoAnuncio int not null,
            codigoAnunciante varchar(11) not null,
            codigoInteressado varchar(11) not null,
            codigoRoupaInteressado int not null,
            codigoRoupaAnunciante int not null,
            foreign key (codigoAnuncio) references anuncio,
            foreign key (codigoInteressado) references pessoa (cpf),
            foreign key (codigoRoupaInteressado) references roupa (codigo),
            foreign key (codigoAnunciante) references pessoa (cpf),
            foreign key (codigoRoupaAnunciante) references roupa (codigo)) ENGINE=MyISAM;"
        );
        mysqli_query($con, "CREATE TABLE IF NOT EXISTS troca (
            codigo int primary key AUTO_INCREMENT,
            codigoInteressado varchar(11) not null,
            codigoAnunciante varchar(11) not null,
            roupaAnunciante int not null,
            roupaInteressado int not null,
            data_troca DATE not null,
            avaliacao int,
            foreign key (codigoAnunciante) references pessoa (cpf),
            foreign key (codigoInteressado) references pessoa (cpf),
            foreign key (roupaAnunciante) references roupa (codigo),
            foreign key (roupaInteressado) references roupa (codigo)) ENGINE=MyISAM;"
        );

        mysqli_query($con, "INSERT INTO pessoa (cpf, nome, telefone, bairro, cidade, estado, email) 
        values ('08832722254', 'Gabriel', '73999999999', 'campo verde', 'Santa Cruz Cabrália', 'bahia', 'gabriel@gmail.com')");
        
        header("Location: home.php");
    ?>
</body>
</html>