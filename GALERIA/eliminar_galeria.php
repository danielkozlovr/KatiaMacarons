<?php
    include("../CONEXAO/conexao.php");

    $id=$_GET['id'];

    $remover="DELETE FROM galeria where Id='".$id."'";
    $resultado=mysqli_query($conexao,$remover);
    if(!$resultado){
        echo'<script>window.alert("Erro ao eliminar imagem!");</script>';
        exit;
    }else{
        echo'<script>window.alert("Dados Eliminados!");</script>';
        require_once('consulta_galeria.php');
    }
?>