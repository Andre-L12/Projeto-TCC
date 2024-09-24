<?php
    require "funçoesUteis.php";
    require "../model/instrutorDAO.php";

    $acao = $_POST["btnCadastrar"];

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $sexo = $_POST["sexo"];

    $msg = validarInstrutor($nome, $cpf, $sexo);

    if(empty($msg)){

        //Tratando dados
        $nome = tratarNome($nome);

        if ($acao == "Cadastrar"){
            //Inserindo dados no banco
        $id = criarInstrutor($nome, $cpf, $sexo);

        //Devolvendo mensagem
        header("Location:../view/cadastrar-instrutor.php?msg=$id");
        } else {
            $id_instrutor = mysqli_fetch_array(pesquisarInstrutorPorCPF($cpf))["id_instrutor"];
            $id = alterarInstrutor($nome, $cpf, $sexo, $id_instrutor);

            header("Location:../view/cadastrar-instrutor.php?msg=Intrutor $id alterado com sucesso.");
        }
        
    } else {
        header("Location:../view/cadastrar-instrutor.php?msg=$msg");
    }

?>