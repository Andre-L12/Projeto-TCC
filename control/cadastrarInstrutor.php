<?php
    require "funçoesUteis.php";
    require "../model/instrutorDAO.php";

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $sexo = $_POST["sexo"];

    $msg = "";

    $instrutorExiste = instrutorExiste($cpf);

    if (!$instrutorExiste){
        $msg = validarInstrutor($nome, $cpf, $sexo);
    } else {
        $msg = "Esse instrutor já está cadastrado.";
    }

    if(empty($msg)){
        //Tratando dados
        $nome = tratarNome($nome);

        //Inserindo dados no banco
        $id = criarInstrutor($nome, $cpf, $sexo);

        //Devolvendo mensagem
        header("Location:../view/cadastrar-instrutor.php?msg=Cadastro de instrutor $id realizado com sucesso.");
    } else {
        header("Location:../view/cadastrar-instrutor.php?msg=$msg");
    }

?>