<?php
include("../CONEXAO/conexao.php");


    $id_prod=$_GET['id'];

    $remover="DELETE FROM produtos where Id_Produto='".$id_prod."'";
    $resultado=mysqli_query($conexao,$remover);
    if(!$resultado){
        echo'<script>window.alert("Erro ao eliminar o produto!");</script>';
        exit;
    }else{
        echo'<script>window.alert("Dados Eliminados!");</script>';
        require_once('consultar_produtos.php');
    }
?>