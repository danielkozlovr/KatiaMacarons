<?php
    include("../CONEXAO/conexao.php");
    session_start();
    $id=$_GET['id'];
    $consulta = "Select * from produtos where Id_Produto='".$id."'";
    $resultado=mysqli_query($conexao,$consulta);
    $registo=mysqli_fetch_array($resultado);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style3.css">
    <link rel="icon" href="../IMAGENS/eko logo.png" type="image/png">
    <script src="https://kit.fontawesome.com/83e3d20250.js" crossorigin="anonymous"></script>
    <title>Administração - Editar Produtos</title>
</head>
<body>
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <a href="../index.php"><img width="100px" src="../IMAGENS/eko logo.png"></a>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="../CLIENTES/consulta_clientes.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-friends	 me-2"></i>Clientes</a>
                <a href="../GALERIA/consulta_galeria.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-image me-2"></i>Galeria</a>
                <a href="consultar_produtos.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fa-solid fa-box me-2"></i>Produtos</a>
                <a href="../ENCOMENDAS/consulta_encomendas.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-regular fa-van-shuttle me-2"></i>Encomendas</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Sair</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center" style="margin-left: 80px">
                    <h2 class="fs-2 m-0" >Adicionar Produtos</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" style="margin-right: 80px" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['nome'];?>
                        </li>
                    </ul>
                </div>
            </nav>
        
           
                <div class="container-fluid px-4 pt-5">
                    <form  method="POST" action="editar2_produtos.php">
                        <div class="form-group mb-3">
                            <label for="nome_produto">Nome do Produto:</label>
                            <input type="text" class="form-control" id="nome_produto" value="<?php echo $registo['Nome'] ?>" name="nome_produto" style="width:300px;">
                            <input type="hidden" id="id_prod" value="<?php echo $id ?>" name="id_prod" style="width:300px;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="preco">Preço:</label>
                            <input type="text" class="form-control" id="preco" value="<?php echo $registo['Preco_Unid'] ?>"name="preco" style="width:300px;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="imagem">Imagem:</label>
                            <?php $nome = $registo['Foto'] ?>
                            <input type="file" class="form-control"  value="<?php echo $nome ?>"name="imagem" required style="width:300px;">
                        </div>
                    <button name="insert" class="btn btn-primary mt-3">Atualizar</button>
            </form>
            
    </div>
</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>



              
