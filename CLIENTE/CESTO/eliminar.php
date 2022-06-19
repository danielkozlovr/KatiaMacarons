<?php
include('../../../ADMIN/CONEXAO/conexao.php');
$id=$_REQUEST['id'];
$sql= " delete from cesto where Id_Cesto = '$id'   ";
$dados= mysqli_query($conexao,$sql);
header('location:cesto.php');
?>
