
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
    <title>Cesto - KatiaMacarons</title>
    <link rel="stylesheet" href="cesto.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../ADMIN/IMAGENS/eko logo.png" type="image/png">
    <title>KATIAMACARONS</title>
    <link rel="stylesheet" href="cesto.css">
    <link rel="stylesheet" href="../CSS/style.css">
   
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
                <a href="../CONTA/conta.php"><?php echo $_SESSION['nome']?></a>
                <div class="div-cesto">
                    <div class="div-img">
                        <a href="cesto.php"><img class="cestoimg" src="../../../ADMIN/IMAGENS/cesto.png"></a>
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
 <div class="cesto">
 <?php 
$sql= " select * from cesto where Nome_Completo = '".$_SESSION['nome']."'";

$resultados= mysqli_query($conexao,$sql);

if (mysqli_num_rows ($resultados) >0) 
{
?>
<br>

<table class="table-produtos">

    <tr>
        <td class="table-td">
            <div class="table-td1">
                Cesto <br><br>
            </div>
        </td>
    </tr> 
    <tr>
        <td colspan=5>
            <hr class="hr-color">
        </td>  
    </tr> 
    <tr>
        <td class="table-td">
            <div class="table-td2">
                Nome
            </div>
            <div class="table-td2-2">
                Preço
            </div>
            <div class="table-td2-3">
                Qtd
            </div>
            <div class="table-td2-4">
                Subtotal
            </div>
        </td>
    </tr>
   
<?php
    while ($registo=mysqli_fetch_assoc($resultados))
     {
?>
    <tr>
        <td colspan=5>
            <hr class="hr-color">
        </td>  
    </tr>
      <?php
        echo '<tr>';
        ?>

        <?php
        echo '<td colspan="5">'
        
        ?>
       <form method="post" action="atualizar.php">
    <div class="table-td">  
        
        <div class="div-imagem">
            <img class="" src="../../../ADMIN/MACIMAGENS/<?php echo $registo['Foto'] ?>">
            <p>
                <?php echo $registo['Nome']?>
            </p>
        </div>
        <div class="div-preco">
            <p>
                <?php echo $registo['Preco_Unid']?>€
            </p>
        </div>
        <div class="div-qtd">
            <p>
                <input type="text" name="quantidade" placeholder="<?php echo $registo['Quantidade']?>" >
                <input type="text" name="id" value="<?php echo $registo['Id_Produto']?>"hidden >
                <div class="div-update">
                <button type="submit" name="atualizar"><img src="../../../ADMIN/IMAGENS/update.png"></button>
                </div>
                </form>
            </p>
        </div>
        <div class="div-sub">
            <!-- Calculo sutotal -->
        <?php
        $total = $registo['Quantidade']*$registo['Preco_Unid'];
        $final = $final + $total;
        ?>
        <!------------> 
        <p><label for=""><?php echo $total; ?> €</label></p>
        </div>
        <div class="div-eliminar">
            <a href="eliminar.php?id=<?php echo($registo['Id_Cesto']);?>"><img src="../../../ADMIN/IMAGENS/eliminar.png" title="Eliminar"></a>
        </div>
    </div>
<?php
    } 
?>
</tr>

<tr>
    <td class="div-final">
        <div class="div-adicionar">
            <button class="button-limpar" onclick="window.location='../PRODUTOS/produtos.php'">ADICIONAR PRODUTO</button>  
        </div>
        <div class="div-total">
            <label id="total">TOTAL</label>
        </div>
        <div class="div-resultado">
            <?php
            echo $final ;?>€
        </div>
        <div class="div-esvaziar">
            <button colspan="2" class="button-esvaziar" onclick="window.location.href='limparcarrinho.php'">ESVAZIAR CARRINHO DE COMPRAS</button>
        </div>
    </td>
</tr>
<tr>
    <td colspan="5">
        <center>
        <br><button class="button-checkout" onclick="window.location.href='checkout.php'">Realizar Checkout</button>
        </center>
    </td>
</tr>
</table>
<?php    
}
else
{
    ?> <br><br><center> <?php
    echo "Não tens nenhum item no teu carrinho de compras.";
}
?>

</center>
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
            <a href="https://www.instagram.com/katiamacarons/" target="_brank"><img src="../../../ADMIN//IMAGENS/instagram.png" width="30px" title="INSTAGRAM"></a>&nbsp;&nbsp;&nbsp;<a href="https://m.facebook.com/katiamacarons-101283762358410/" target="_brank"><img src="../../../ADMIN/IMAGENS/facebook.png" width="30px" title="FACEBOOK"></a>
</div>
</section>  
