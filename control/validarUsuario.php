<?php
    session_start();
    if(isset($_SESSION["nome"])){
        $nome= $_SESSION["nome"];
        $tipo=$_SESSION["tipo"];
        if(isset($_SESSION["matricula"])){
            $id=$_SESSION["matricula"];
        }
        elseif(isset($_SESSION["id_aluno"])){
            $id=$_SESSION["id_aluno"];
        }
    }
    else{
        header("Location:tela-login.php?msg= Você não está logado!");
    }
?>