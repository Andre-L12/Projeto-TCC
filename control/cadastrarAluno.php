<?php
    require "funçoesUteis.php";
    require "../model/AlunoDAO.php";

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $email = $_POST["email"];
    $celular=$_POST["celular"];

    if(isset($_FILES["foto"])){
        $foto = $_FILES["foto"];
    }
    else{
        $foto=null;
    }


    $msg = validarAluno($nome, $cpf,$foto);


    if(empty($msg)){

        //Inserindo dados no banco
        $id = cadastrarAluno($nome, $cpf, $email,$celular,$foto);

        //Devolvendo mensagem
        header("Location:../view/cadastrar-aluno.php?msg=$id");
    } else {
        header("Location:../view/cadastrar-aluno.php?msg=$msg");
    }

?>