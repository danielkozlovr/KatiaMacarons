<?php
include('../../../ADMIN/CONEXAO/conexao.php');
Session_Start();

    // obter os dados do formulário

    $login = $_POST['email'];
    $senha = $_POST['pass'];
    $sql= " select * from conta where Email like '$login' and Palavra_Passe ='$senha' ";
    $resultados= mysqli_query($conexao,$sql);

    while ($registo=mysqli_fetch_assoc($resultados))
    {
      $_SESSION['nome'] = $registo['Nome_Completo'];
      $_SESSION['data'] = $registo['Data_Nascimento'];
      $_SESSION['contacto'] = $registo['Contacto'];
      $_SESSION['morada'] = $registo['Morada'];
      $_SESSION['email'] = $registo['Email'];
      $_SESSION['pass'] = $registo['Palavra_Passe'];
    }



  if (mysqli_num_rows($resultados) >0) {
    header('location:../../Cliente/index.php');
    }
    else
    {       
           ?>
<script> 
alert ("Dados Incorretos! Por favor insira novamente !!!"); 
window.location.assign('login.php');
</script>
           <?php
    
  }

?>