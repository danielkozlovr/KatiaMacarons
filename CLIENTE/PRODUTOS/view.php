
<?php
include('../../../ADMIN/CONEXAO/conexao.php');
session_start();
if(isset( $_REQUEST['id']))
{ 
 $id = $_REQUEST['id'];
 $sql= " select * from produtos where Id_Produto = '$id' ";

 $resultados= mysqli_query($conexao,$sql);

 if (mysqli_num_rows ($resultados) >0) 
 {

  // apresentar as colunas da tabela com echo.
    if ($registo=mysqli_fetch_assoc($resultados))
     {
     
      $id = $registo['Id_Produto'];
      $Foto = $registo['Foto'];
      $nome = $registo['Nome'];
      $preco = $registo['Preco_Unid'];
      
     
     }
 }
}

$select_rows = mysqli_query($conexao, "SELECT * FROM `cesto` where Nome_Completo = '".$_SESSION['nome']."'") or die('query failed');
$row_count = mysqli_num_rows($select_rows);



      ?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../ADMIN/IMAGENS/eko logo.png" type="image/png">
    <title><?php echo $nome?> - KatiaMacarons</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
 <header>
     <nav>
         <p>KATIAMACARONS</p>
         <ul>
             <li><a href="../index.php">INICIO</a></li>
             <li><a href="../GALERIA/galeria.php">GALERIA</a></li>
             <li><a href="produtos.php">PRODUTOS</a></li>
             <li class="dropdown">
                <button class="dropbtn"><img src="../../../ADMIN/IMAGENS/utili.png" width="50px" height="25px"></button>
                <div class="dropdown-content">
                <a href="../CONTA/conta.php"><?php echo $_SESSION['nome']?></a>
                <div class="div-cesto">
                    <div class="div-img">
                        <a href="../CESTO/cesto.php"><img class="cestoimg" src="../../../ADMIN/IMAGENS/cesto.png"></a>
                    </div>
                    <div class="div-count">
                    <label class="label" >(<?php echo $row_count?>)</label>
                    </div>
                </div>
                <a href="../../index.php">Sair</a>
            </div>
             </li>
         </ul>
     </nav>
 </header>
 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>">
 <input type="hidden" name="nomecompleto" value="<?php echo  $_SESSION['nome']; ?>">
<input type="hidden" name="foto" value="<?php echo $Foto ?>">
 <input type="hidden" name="nome" value="<?php echo $nome; ?>">
 <input type="hidden" name="preco" value="<?php echo $preco; ?>">
<div class="definicao">
    <div class="cartaz">
        <div class="esquerda">
            <img class="imagemproduto" src="../../../ADMIN/MACIMAGENS/<?php echo $Foto ?>">
        </div>
        <div class="direita">
            <div class="topo">
                <div class="nome"><?php echo $nome ?> </div>
                <div class="preco"><?php echo $preco ?>  €</div>
            </div>
           <hr>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <button class="carrinho" name="carrinho">Adicionar ao carrinho</button>
        </div>
        </form>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>
<hr width="90%">
<section class="footer">
<div class="left">
    <h3>EMPRESA</h3><br>
        <img class="logotipo" src="../../../ADMIN/IMAGENS/eko logo.png" title="KATIAMACARONS">
</div>
<div class="center">
    <h3>CONTACTO</h3><br>
    <ul>
        <a href = "mailto:ekaterinatitova@hotmail.com" target="_brank">ekaterinatitova@hotmail.com</a><br><br><br>
        <a href="https://api.whatsapp.com/send/?phone=910787434&text&app_absent=0" target="_brank">wa.me/910787434</a>
</div>
<div class="right">
    <h3>REDES SOCIAIS</h3><br><br>
            <a href="https://www.instagram.com/katiamacarons/" target="_brank"><img src="../../../ADMIN/IMAGENS/instagram.png" width="30px" title="INSTAGRAM"></a>&nbsp;&nbsp;&nbsp;<a href="https://m.facebook.com/katiamacarons-101283762358410/" target="_brank"><img src="../../../ADMIN/IMAGENS/facebook.png" width="30px" title="FACEBOOK"></a>
</div>
</section>
<?php
if(isset($_POST["carrinho"]))
{
    $id = $_POST['id'];   
    $nomecompleto = $_POST['nomecompleto']; 
    $foto = $_POST['foto']; 
    $nome = $_POST['nome'];
    $quantidade = 1;
    $preco = $_POST['preco']; 
    $dados = mysqli_query($conexao,"insert into cesto(Id_Produto, Nome_Completo, Foto, Nome, Quantidade, Preco_Unid) values('$id','$nomecompleto','$foto','$nome','$quantidade','$preco')");
    if($dados)
    {
        ?>
        <?php
          echo "<script> alert('Produto inserido com sucesso!'); </script>";
        ?>
           <script> 
                window.location.assign('produtos.php');
            </script>
            <?php
    }
}

