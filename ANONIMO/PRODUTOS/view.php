<?php
include('../../../ADMIN/CONEXAO/conexao.php');
if(isset( $_REQUEST['id']))
{ 
 $id = $_REQUEST['id'];
 $sql= " select * from produtos where Id_Produto = '$id' ";

 $resultados= mysqli_query($conexao,$sql);

 if (mysqli_num_rows ($resultados) >0) 
 {
    if ($registo=mysqli_fetch_assoc($resultados))
     {
      $id = $registo['Id_Produto'];
      $Foto = $registo['Foto'];
      $nome = $registo['Nome'];
      $preco = $registo['Preco_Unid'];
     }
 }
}
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

    <!-- Mensagem Erro -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>
<body>
 <header>
     <nav>
         <p>KATIAMACARONS</p>
         <ul>
             <li><a href="../../index.php">INICIO</a></li>
             <li><a href="../GALERIA/galeria.php">GALERIA</a></li>
             <li><a href="produtos.php">PRODUTOS</a></li>
             <li class="dropdown">
                <button class="dropbtn"><img src="../../../ADMIN/IMAGENS/utili.png" width="50px" height="25px"></button>
                <div class="dropdown-content">
                <a href="../LOGIN/login.php">Iniciar Sessão/Registar-se</a>
            </div>
             </li>
         </ul>
     </nav>
 </header>
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
           <button class="carrinho" onclick="window.location.href='../LOGIN/login.php'">Iniciar sessão para comprar</button>
        </div>
    </div>
</div>
<br><br><br>
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
</body>
</html>