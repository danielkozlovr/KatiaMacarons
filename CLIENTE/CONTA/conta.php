<?php
include('../../../ADMIN/CONEXAO/conexao.php');
session_start();
$select_rows = mysqli_query($conexao, "SELECT * FROM `cesto` where Nome_Completo = '".$_SESSION['nome']."'") or die('query failed');
$row_count = mysqli_num_rows($select_rows);

?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../ADMIN/IMAGENS/eko logo.png" type="image/png">
    <title>Conta - KatiaMacarons</title>
    <link rel="stylesheet" href="conta.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script defer src="conta.js"></script>
</head>
<body>
 <header>
     <nav>
         <p>KATIAMACARONS</p>
         <ul>
             <li><a href="../index.php">INICIO</a></li>
             <li><a href="../GALERIA/galeria.php">GALERIA</a></li>
             <li><a href="../PRODUTOS/produtos.php">PRODUTOS</a></li>
             <li class="dropdown">
                <button class="dropbtn"><img src="../../../ADMIN/IMAGENS/utili.png" width="50px" height="25px"></button>
                <div class="dropdown-content">
                <a href="conta.php"><?php echo $_SESSION['nome']?></a>
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
 <center>
 <div class="div-lista-definicoes">
     <a href="conta.php" style="color:#757475">Perfil</a><a href="encomendas.php">Encomendas</a><a href="privacidade.php">Segurança e Privacidade</a>
 </div>
<div class="div-informacao">
    <h3>A minha Conta</h3>
</div>
<hr class="hr">
<form action="editar_nome_telefone.php">
<div class="div-dados">
<div class="div-dados-esq">     
<p>
    <b><?php echo $_SESSION['nome']?></b><br>
    <?php echo $_SESSION['email']?><br>
    <?php echo $_SESSION['contacto']?>
</p>
</div>
<div class="div-dados-dir">
    <button type="submit" class="editar"><img src="imagem/editar.png"> Editar</button>
</div>
</div>
</form>
<hr class="hr">
<form action="editar_morada.php">
<div class="div-dados">
<div class="div-dados-esq">     
<p>
    <b>Morada</b><br>
    <?php echo $_SESSION['morada']?><br>
</p>
</div>
<div class="div-dados-dir">
    <button type="submit" class="editar"><img src="imagem/editar.png"> Editar</button>
</div>
</div>
</form>
<hr class="hr">









 </center>
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