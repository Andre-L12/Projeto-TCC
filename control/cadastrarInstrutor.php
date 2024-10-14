<?php
    require "funçoesUteis.php";
    require "../model/instrutorDAO.php";

    // Receber os campos POST:
    $acao = $_POST["btnCadastrar"];

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $sexo = $_POST["sexo"];
    $dias_semana = "";

    // - Checkbox dias da semana:
    if (isset($_POST["domingo"])){
        $dias_semana .= "1";
    } else {
        $dias_semana .= "0";
    }
    if (isset($_POST["segunda"])){
        $dias_semana .= "1";
    } else {
        $dias_semana .= "0";
    }

    if (isset($_POST["terca"])){
        $dias_semana .= "1";
    } else {
        $dias_semana .= "0";
    }

    if (isset($_POST["quarta"])){
        $dias_semana .= "1";
    } else {
        $dias_semana .= "0";
    }

    if (isset($_POST["quinta"])){
        $dias_semana .= "1";
    } else {
        $dias_semana .= "0";
    }

    if (isset($_POST["sexta"])){
        $dias_semana .= "1";
    } else {
        $dias_semana .= "0";
    }

    if (isset($_POST["sabado"])){
        $dias_semana .= "1";
    } else {
        $dias_semana .= "0";
    }

    // Validação de dados:
    $msg = validarInstrutor($nome, $cpf, $sexo, $dias_semana);

    if(empty($msg)){

        //Tratando dados
        $nome = tratarNome($nome);

        if ($acao == "Cadastrar"){
            // Inserir Intrutor
            $id = criarInstrutor($nome, $cpf, $sexo, $dias_semana);

            // Devolver mensagem
            header("Location:../view/cadastrar-instrutor.php?msg=$id");
        } else {
            // Alterar dados de Instrutor
            // - Pegando id com base no CPF:
            $id_instrutor = mysqli_fetch_array(pesquisarInstrutorPorCPF($cpf))["id_instrutor"];
            $id = alterarInstrutor($nome, $cpf, $sexo, $dias_semana, $id_instrutor);

            // Devolver mensagem
            header("Location:../view/cadastrar-instrutor.php?msg=Intrutor $id alterado com sucesso.");
        }
        
    } else {
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-instrutor.php?msg=$msg");
    }

?>