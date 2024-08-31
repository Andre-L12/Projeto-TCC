<?php
    require "../model/funcoesBD.php";
    require_once "../model/conexaoBD.php";
    require "funçoesUteis.php";

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $sexo = $_POST["sexo"];

    $msg = validarInstrutor($nome, $cpf, $sexo);

    if(empty($msg)){
        //Tratando dados
        $nome = tratarNome($nome);

        //Inserindo dados no banco
        $id = criarInstrutor($nome, $cpf, $sexo);

        //Devolvendo mensagem
        header("Location:../view/base/cadastrar-instrutor.php?msg=Cadastro de instrutor $id realizado com sucesso.");
    } else {
        header("Location:../view/base/cadastrar-instrutor.php?msg=$msgErro");
    }

?>