<?php
require "../model/conexaoBD.php";
$conect=conectarbd();
$usuario=$_POST["cpf"];
$senha=$_POST["senha"];
$query="SELECT cpf FROM aluno WHERE cpf='$usuario'";
$select=mysqli_query($conect,$query);
$resultado =mysqli_fetch_assoc($select);
$qtd=mysqli_num_rows($select);
if (($qtd == 1)&&($usuario==$senha)){
    header("Location:../view/tela-inicio.html");
}
else{
    $mensagem=("Deu errado! Usuário ou senha incorretas");
    header("Location:../view/tela-login.php?msg=$mensagem");
}
/*falta adicionar mais verificações e criar uma seção
para o usuário ficar logado */ 

?>