<?php
include('../../../ADMIN/CONEXAO/conexao.php');
Session_Start();

?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../ADMIN/IMAGENS/eko logo.png" type="image/png">
    <title>iniciar sessão/registar-se - KatiaMacarons</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="style.js"></script>
    <script>
        function validardataDeNascimento(data)
{

         dataAtual= new Date(); //data atual
         yyyy = dataAtual.getFullYear();
         data = new Date(data); //data de nascimento
         yyyy2 = data.getFullYear();
         var limite_idade = yyyy - yyyy2;
         if (data>dataAtual || limite_idade > 150)
         {
            alert("Data Inválida!");
                $('input[type=date]').val('0000-00-00');
        } 
}
    </script>
</head>
<body>
<header>
     <nav>
         <p>KATIAMACARONS</p>
         <ul>
             <li><a href="../../index.php">INICIO</a></li>
             <li><a href="../GALERIA/galeria.php">GALERIA</a></li>
             <li><a href="../PRODUTOS/produtos.php">PRODUTOS</a></li>
             <li class="dropdown">
                <button class="dropbtn"><img src="../../../ADMIN/IMAGENS/utili.png" width="50px" height="25px"></button>
                <div class="dropdown-content">
                <a href="../LOGIN/login.php">Iniciar Sessão/Registar-se</a>
            </div>
             </li>
         </ul>
     </nav>
 </header>
<div class="body">
    <div class="registo">
    <div class="imagem">
        <img src="../../../ADMIN/IMAGENS/eko logo.png">
    </div>
    <div class="titulo">TORNA-TE UM MEMBRO</div>
    <div class="text">
    Cria o teu perfil e obtém acesso antecipado ao melhor a nível de produtos katiamacarons, inspiração e comunidade.
    </div>
    <div class="sessao">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">          
        <input type="text" name="nome" title="Só é permitido o uso de LETRAS!" placeholder="Nome" required><br><br>
        <input type="date" onchange="validardataDeNascimento(this.value);" name="data" title="Insira a sua data de nascimento!" placeholder="Data de Nascimento" required><br><br>
        <input type="text" name="contacto" placeholder="Contacto" required><br><br>
        <input type="text" name="Morada" placeholder="Morada" required><br><br>
        <input type="email" name="Email" placeholder="exemplo@exemplo.com" required><br><br>
        <input type="password" name="Pass" placeholder="Palavra-Passe" required><br><br>
        <button class="botao" name="registar">Registar-se</button><br><br>   
        Já és Membro? <a id="a">Iniciar Sessão.</a>    
    </form>
    </div>
    </div>
<div class="login">
    <div class="imagem">
        <img src="../../../ADMIN/IMAGENS/eko logo.png">
    </div>
    <div class="titulo">A TUA CONTA PARA TODO O CONTEÚDO DO KATIAMACARONS</div>
    <div class="sessao">
    <form class="form" action="verifica.php" method="post">
        <input type="email" name="email" id="email" placeholder="Endereço de Email" required><br><br>
        <input type="password" name="pass" placeholder="Palavra-Passe" required><br><br>
        <button class="botao">Iniciar Sessão</button><br><br>
        Não és membro? <a id="hiperligacao">Junta-te a nós.</a>
    </form>
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
<?php

if(isset($_POST["registar"]))
{
$nome = $_POST['nome'];
$data = $_POST['data'];
$morada = $_POST['Morada'];
$email = $_POST['Email'];
$contacto = $_POST['contacto'];
$pass = $_POST['Pass'];
$dados = mysqli_query($conexao,"insert into conta(Nome_Completo, Data_Nascimento, Contacto, Morada, Email, Palavra_Passe) values('$nome','$data','$contacto','$morada','$email','$pass')");
if($dados)
{
    $mensagem = "Conta criada com sucesso!";
    echo "<script type='text/javascript'>alert('$mensagem');</script>";
}
else{
    $mensagem = "Preencha os campos corretamente ou os campos em falta!";
    echo "<script type='text/javascript'>alert('$mensagem');</script>";
}

}
?>