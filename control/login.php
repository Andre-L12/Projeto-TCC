<?php
    require_once "../model/conexaoBD.php";
    require_once "funçoesUteis.php";

    $conect = conectarBD();

    //Pegando dados do forumulário de login (tela-login.php):
    $usuario = $_POST["cpf"];
    $senha = $_POST["senha"];
    //veririficar dados
    $msg= validarLogin($usuario,$senha);
    if(empty($msg)){

        $query = "SELECT * FROM funcionario WHERE matricula='$usuario'";
        $select = mysqli_query($conect,$query);
        $resultado = mysqli_fetch_assoc($select);
        
        if (empty($resultado)){
            //O CPF é de um aluno
            $query = "SELECT * FROM aluno WHERE cpf='$usuario'";
            $select = mysqli_query($conect,$query);
            $resultado = mysqli_fetch_assoc($select);
            $qtd = mysqli_num_rows($select);

            if (($qtd == 1)&&($usuario==$senha)){
                session_start();
                $_SESSION["nome"] = $resultado["nome"];
                $_SESSION["id_aluno"] = $resultado["id_aluno"];
                $_SESSION["tipo"] = '1'; 
                $_SESSION["foto"]=$resultado["foto"];
                header("Location:../view/menu-aluno.php");
            } else {
                $mensagem="Deu errado! Usuário ou senha incorretos aluno";
                header("Location:../view/tela-login.php?msg=$mensagem");
            }

        } else {
            //O CPF é de um funcionário
            $password=$resultado["senha"];

            if ($senha==$password){
                session_start();
                $_SESSION["nome"] = $resultado["nome"];
                $_SESSION["matricula"] = $resultado["matricula"];
                $_SESSION["tipo"] = '2';
                $_SESSION["foto"]=$resultado["foto"];
                header("Location:../view/menu-funcionario.php");
            } else {
                $mensagem="Deu errado! Usuário ou senha incorretos funcionario";
                header("Location:../view/tela-login.php?msg=$mensagem");
            }

        }

    }else{
        header("Location:../view/tela-login.php?msg=$msg");
    }
    
    /*falta adicionar mais verificações e criar uma seção
    para o usuário ficar logado */ 
?>