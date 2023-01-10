<?php 

$con = mysqli_connect('127.0.0.1', 'root', '')
or die('Falha na conexão'.mysqli_error($con));
$db = mysqli_query($con, "CREATE DATABASE IF NOT EXISTS swap");
$selecionar = mysqli_select_db($con, "swap");

?>