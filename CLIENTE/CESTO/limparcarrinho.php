<?php
include('../../../ADMIN/CONEXAO/conexao.php');
session_start();
$sql= " delete from cesto where Nome_Completo = '".$_SESSION['nome']."'";
$dados= mysqli_query($conexao,$sql);
header('location:cesto.php');
?>
