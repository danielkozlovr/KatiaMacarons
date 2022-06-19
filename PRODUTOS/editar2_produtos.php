<?php

include("../CONEXAO/conexao.php");
    
    $id_prod = $_POST['id_prod'];
    $nome=$_POST['nome_produto'];
    $preco=$_POST['preco'];
    $imagem = $_POST['imagem'];

    $inserir="Update produtos SET Foto= '".$imagem."',Nome= '".$nome."',Preco_Unid= '".$preco."' WHERE Id_Produto='".$id_prod."'";
    $resultado=mysqli_query($conexao,$inserir);
    
    if($resultado==1)echo "<script> alert('Produtos inseridos com sucesso') </script>"; 
    else echo "<script> alert('Produtos não inseridos') </script>";
    header("Location: consultar_produtos.php");
    exit;
    ?>