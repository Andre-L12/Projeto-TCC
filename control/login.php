<?php
    require "../model/conexaoBD.php";

    $conect = conectarBD();

    //Pegando dados do forumulário de login (tela-login.php):
    $usuario = $_POST["cpf"];
    $senha = $_POST["senha"];
    
    //Verificando se o CPF é de um funcionário:
    $query = "SELECT cpf FROM funcionario WHERE cpf='$usuario'";
    $select = mysqli_query($conect,$query);
    $resultado = mysqli_fetch_assoc($select);
    
    if (empty($resultado)){
        //O CPF é de um aluno
        $query = "SELECT cpf FROM aluno WHERE cpf='$usuario'";
        $select = mysqli_query($conect,$query);
        $resultado = mysqli_fetch_assoc($select);
        $qtd = mysqli_num_rows($select);

        if (($qtd == 1)&&($usuario==$senha)){
            header("Location:../view/tela-inicioAluno.html");
        } else {
            $mensagem="Deu errado! Usuário ou senha incorretos";
            header("Location:../view/tela-login.php?msg=$mensagem");
        }

    } else {
        //O CPF é de um funcionário
        $query = "SELECT senha FROM funcionario WHERE cpf='$usuario'";
        $select = mysqli_query($conect,$query);
        $resultado = mysqli_fetch_assoc($select);
        $password=$resultado["senha"];

        if ($senha==$password){
            header("Location:../view/tela-inicio.html");
        } else {
            $mensagem="Deu errado! Usuário ou senha incorretos";
            header("Location:../view/tela-login.php?msg=$mensagem");
        }

    }
    
    /*falta adicionar mais verificações e criar uma seção
    para o usuário ficar logado */ 
?>