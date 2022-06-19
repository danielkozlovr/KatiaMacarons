<?php

$servidor="localhost";
$utilizador="root";
$pass="";
$db="katiamacarons";

$conexao = mysqli_connect($servidor, $utilizador, $pass) or die ("Erro na conexão do banco de dados.");
 
//Seleciona o banco de dados
$selecionabd = mysqli_select_db($conexao,$db) or die ("Banco de dados inexistente.");

?>