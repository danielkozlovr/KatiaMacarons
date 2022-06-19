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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style3.css">
    <link rel="icon" href="../IMAGENS/eko logo.png" type="image/png">
    <script src="https://kit.fontawesome.com/83e3d20250.js" crossorigin="anonymous"></script>
    <title>Administração - Consultar Produtos</title>
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
                    <h2 class="fs-2 m-0" >Consultar Produtos</h2>
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
      
            <?php 
                $sql= " select * from produtos";
                $resultados= mysqli_query($conexao,$sql);
                $row = mysqli_num_rows($resultados);
            ?>
          
          <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3" style="margin-left: 80px;">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" >
                            <div>   
                                <h3 class="fs-2"><?php echo $row ?></h3>
                                <p class="fs-5">Produtos</p>
                            </div>
                            <i class="fa-solid fa-box fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3" style="width: 250px">
                        <div class="p-4 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="height: 125px">
                            <div>
                                <p class="fs-5 mt-3">Adicionar</p>
                            </div>
                            <a href="adicionar_produtos.php">
                            <i
                                class="fas fa-solid fa-plus fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </a>    
                        </div>
                    </div>
            <?php 
                $ligar=mysqli_connect('localhost','root',"");
                if(!$ligar) {echo'<p>Erro:Falha na ligação com a base de dados!'; exit;}
                mysqli_select_db($ligar,'katiamacarons');
                $consulta = "Select * from produtos";
                $resultado=mysqli_query($ligar,$consulta);
                $nregistos=mysqli_num_rows($resultado);
                echo '<br/>';   
            ?>
            <br>
            <table class="table" style="width:1100px;">
                <thead class="table" style="background-color:#4EBC79;">
                    <tr>
                        <th scope="col">ID Produto</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço Unidade (€)</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for($i=0; $i<$nregistos;$i++){
                            $registo = mysqli_fetch_assoc($resultado);
                            echo '<tr>';
                            echo '<th>'.$registo['Id_Produto'].'</th>';
                            echo '<th>'
                            ?>
                              <img  style="width: 70px" name="imagem" src="../MACIMAGENS/<?php echo $registo['Foto'] ?>">
                            <?php
                            '</th>';
                            echo '<th>'.$registo['Nome'].'</th>';
                            echo '<th>'.$registo['Preco_Unid'].'</th>';
                            echo '<th> <a href="editar_produtos.php?id='.$registo['Id_Produto'].'">
                            <i class="fa-solid fa-pen primary-text border rounded-full secondary-bg p-3"></i></th>';
                            echo '<th> <a href="eliminar_produtos.php?id='.$registo['Id_Produto'].'">
                            <i class="fa-solid fa-trash primary-text border rounded-full secondary-bg p-3"></i></th>';
                            echo '<tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>