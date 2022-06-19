<?php
include('../../../ADMIN/CONEXAO/conexao.php');
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../ADMIN/IMAGENS/eko logo.png" type="image/png">
    <title>Galeria - KatiaMacarons</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body bg-color="pink">
<header>
     <nav>
         <p>KATIAMACARONS</p>
         <ul>
             <li><a href="../../index.php">INICIO</a></li>
             <li><a href="galeria.php">GALERIA</a></li>
             <li><a href="../PRODUTOS/produtos.php">PRODUTOS</a></li>
             <li class="dropdown">
                <button class="dropbtn"><img src="../../../ADMIN/IMAGENS/utili.png" width="50px" height="25px"></button>
                <div class="dropdown-content">
                <a href="../LOGIN/login.php">Iniciar Sessão/Registar-se</a>
            </div>
             </li>

            </div>
             </li>
            </div>
             </li>
         </ul>
     </nav>
 </header>
 <?php 
$sql= " select * from galeria";

$resultados= mysqli_query($conexao,$sql);

if (mysqli_num_rows ($resultados) >0) 
?>
{
    <section class="portfolio">
     <div class="containerr">
         <div class="row">
             <div class="section-title text-center">
                 <h1>Portfolio</h1>
             </div>
         </div>

         <div class="row">
             <div class="filter-buttons">
                 <ul id="filter-btns">
                     <li class="active" data-target="todos">Todos</li>
                     <li data-target="macarons">Macarons</li>
                     <li data-target="outros">Outros</li>
                 </ul>
             </div>
         </div>

         <div class="row">
             <div class="portfolio-galeria">
             <?php
             while ($registo=mysqli_fetch_assoc($resultados))
             {
                ?>
               <?php  echo '<tr>';
               echo '<td>' ?>
                 <div class="item" data-id="<?php echo $registo['Descricao']; ?>">
                     <div class="inner">
                     <img  src="../../../ADMIN/GALERIA/FOTOS/<?php echo $registo['Foto']?>">
                     </div>
                 </div>
             </td>
                 <?php
   } 
   ?>
             </div>
         </div>
     </div>
 </section><br>
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
    </ul>
</div>
<div class="right">
    <h3>REDES SOCIAIS</h3><br><br>
    <a href="https://www.instagram.com/katiamacarons/" target="_brank"><img src="../../../ADMIN/IMAGENS/instagram.png" width="30px" title="INSTAGRAM"></a>&nbsp;&nbsp;&nbsp;<a href="https://m.facebook.com/katiamacarons-101283762358410/" target="_brank"><img src="../../../ADMIN/IMAGENS/facebook.png" width="30px" title="FACEBOOK"></a>
</div>
</section>
 <script src="script.js"></script>
</body>
</html>