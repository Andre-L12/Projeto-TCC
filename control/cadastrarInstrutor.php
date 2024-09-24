<?php
    require "funçoesUteis.php";
    require "../model/instrutorDAO.php";

    // Receber os campos POST:
    $acao = $_POST["btnCadastrar"];

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $sexo = $_POST["sexo"];

    // Validação de dados:
    $msg = validarInstrutor($nome, $cpf, $sexo);

    if(empty($msg)){

        //Tratando dados
        $nome = tratarNome($nome);

        if ($acao == "Cadastrar"){
            // Inserir Intrutor
            $id = criarInstrutor($nome, $cpf, $sexo);

            // Devolver mensagem
            header("Location:../view/cadastrar-instrutor.php?msg=$id");
        } else {
            // Alterar dados de Instrutor
            // - Pegando id com base no CPF:
            $id_instrutor = mysqli_fetch_array(pesquisarInstrutorPorCPF($cpf))["id_instrutor"];
            $id = alterarInstrutor($nome, $cpf, $sexo, $id_instrutor);

            // Devolver mensagem
            header("Location:../view/cadastrar-instrutor.php?msg=Intrutor $id alterado com sucesso.");
        }
        
    } else {
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-instrutor.php?msg=$msg");
    }

?>