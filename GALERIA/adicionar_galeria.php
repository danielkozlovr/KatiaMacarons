<?php
    include("../CONEXAO/conexao.php");
    session_start()
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../IMAGENS/eko logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style3.css">

    <script src="https://kit.fontawesome.com/83e3d20250.js" crossorigin="anonymous"></script>
    <title>Administração - Adicionar Galeria</title>
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
                <a href="consulta_galeria.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-image me-2"></i>Galeria</a>
                <a href="../PRODUTOS/consultar_produtos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                    <h2 class="fs-2 m-0" >Adicionar Galeria</h2>
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
        
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
                <div class="container-fluid px-4 pt-5">
                    <form enctype="multipart/form-data" method="post" action="../php/adicionarprodutos.php">
                        <div class="form-group mb-3">
                            <label for="imagem">Imagem:</label>
                            <input type="file" class="form-control" id="imagem" name="imagem" style="width:300px;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="funcao">Descrição:</label>
                            <input type="text" class="form-control" id="funcao" name="descricao" title="'macarons' ou 'outros'" style="width:300px;">
                        </div>
                        <button name="insert" class="btn btn-primary mt-3">Adicionar</button>
                    </form>
                </div>
            </form>
            
    </div>
</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php 
if(isset($_POST['insert']))
{
    $imagem = $_POST['imagem'];
    $funcao=$_POST['descricao'];
    $ligar=mysqli_connect('localhost','root',"");

    if(!$ligar) {echo '<p> Erro: Falha na ligação'; exit;}
    mysqli_select_db($ligar,'katiamacarons');

    $inserir="INSERT INTO galeria (Foto,Descricao) values ('$imagem','$funcao')";
    $resultado=mysqli_query($ligar,$inserir);

    if($resultado==1)echo "<script> alert('Imagens inseridas com sucesso') </script>"; 
    else echo "<script> alert('Imagem inserida com sucesso') </script>";


}

?>