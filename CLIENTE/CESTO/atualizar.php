
<?php
include('../../../ADMIN/CONEXAO/conexao.php');
session_start();
if(isset($_POST["atualizar"]))
{ 
    $id = $_POST['id'];
    $quantidade = $_POST['quantidade'];
    $dados = mysqli_query($conexao,"update cesto set Quantidade = '$quantidade' where Id_Produto = '$id'");
    header('location:cesto.php');
}
?>
