<?php
include('../../ADMIN/CONEXAO/conexao.php');
Session_Start();

$select_rows = mysqli_query($conexao, "SELECT * FROM `cesto` where Nome_Completo = '".$_SESSION['nome']."'") or die('query failed');
$row_count = mysqli_num_rows($select_rows);

?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../ADMIN/IMAGENS/eko logo.png" type="image/png">
    <title>KatiaMacarons</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<!-- Menu -->
<header>
     <nav>
         <p>KATIAMACARONS</p>
         <ul>
             <li><a href="index.php">INICIO</a></li>
             <li><a href="GALERIA/galeria.php">GALERIA</a></li>
             <li><a href="PRODUTOS/produtos.php">PRODUTOS</a></li>
             <li class="dropdown">
                <button class="dropbtn"><img src="../../ADMIN/IMAGENS/utili.png" width="50px" height="25px"></button>
                <div class="dropdown-content">
                <a href="CONTA/conta.php"> <?php echo $_SESSION['nome']?></a>
                <div class="div-cesto">
                    <div class="div-img">
                        <a href="CESTO/cesto.php"><img class="cestoimg" src="../../ADMIN/IMAGENS/cesto.png"></a>
                    </div>
                    <div class="div-count">
                    <label class="label" >(<?php echo $row_count?>)</label>
                    </div>
                </div>
                <a href="../index.php">Sair</a>
                </div>
             </li>
         </ul>
     </nav>
 </header>
<!---------->

<!-- Frase -->
<section class="principal">
  <p> CONHEÇA O ATUAL REI DAS PASTELARIAS FRANCESAS!</p>
  <button>Saiba Mais</button>
</section><br><br><br><br>
<!---------->

<!-- Biografia -->
<div class="ekaterina">
    <img src="../../ADMIN/IMAGENS/Ekaterina.jpeg" width="100%" height="100%">
</div>
<div class="about-me">
    <p class="sobremim">SOBRE MIM</p>
    <div class="descricao">
        O meu nome é Ekaterina e sou natural da Rússia. Vivo em Portugal há 22 anos. Portugueses simpáticos, oceano Atlântico hipnotizante e claro, o sol. Plantei morangos, trabalhei com flores e legumes, e de momento sou Esteticista há quase 7 anos. Mas! Há 4 anos, desenvolvi minha massa mãe junto com @ovoynova e comecei a fazer o melhor e mais saudável pão de fermentação natural para a familia. Durante a pandemia, havia muito tempo livre, fiz muitos doces para a minha família. E um belo dia resolvi fazer um curso de macaroons na escola online @bozhko_tatyana_des e me empolguei.... Esta é apenas uma sobremesa indescritivelmente deliciosa feita com os melhores ingredientes. E vocês conhecem macarons?
    </div>
    <div class="macaron">
        <img src="../../ADMIN/IMAGENS/about.png" width="100%">
    </div>
</div><br><br>
<!---------->

<!-- Rodapé -->
<hr width="90%">
<section class="footer">
<div class="left">
    <h3>EMPRESA</h3><br>
    <img class="logotipo" src="../../ADMIN/IMAGENS/eko logo.png" title="KATIAMACARONS">
</div>
<div class="center">
    <h3>CONTACTO</h3><br>
    <ul>
        <a href = "mailto:ekaterinatitova@hotmail.com">ekaterinatitova@hotmail.com</a><br><br><br>
        <a href="https://api.whatsapp.com/send/?phone=910787434&text&app_absent=0">wa.me/910787434</a>
    </ul>
</div>
<div class="right">
    <h3>REDES SOCIAIS</h3><br><br>
    <a href="https://www.instagram.com/katiamacarons/" target="_brank"><img src="../../ADMIN/IMAGENS/instagram.png" width="30px" title="INSTAGRAM"></a>&nbsp;&nbsp;&nbsp;<a href="https://m.facebook.com/katiamacarons-101283762358410/" target="_brank"><img src="../../ADMIN/IMAGENS/facebook.png" width="30px" title="FACEBOOK"></a>
</div>
</section>
<!---------->

</body>
</html>