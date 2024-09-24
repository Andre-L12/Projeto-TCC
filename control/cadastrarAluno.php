<?php
    require "funçoesUteis.php";
    require "../model/AlunoDAO.php";

    // Receber os campos POST:
    $acao = $_POST["btnCadastrar"];

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];

    $foto = $_FILES["foto"];

    // Validação de dados:
    $msg = validarAluno($nome, $cpf,$email);

    // - Validação da imagem:
    // Se for cadastrar, validar.
    if ($acao == "Cadastrar"){
        $msg = validarImagem($foto);
    } else {
        // Se for alterar, validar só se houver imagem.
        if ($foto['error'] == UPLOAD_ERR_NO_FILE) {
            // Não há imagem.
            $foto = null;
        } else {
            // Há imagem.
            $msgErro = $msgErro . validarImagem($foto);
        }
    }


    if(empty($msg)){
        if ($acao == "Cadastrar"){
            // Inserir Aluno
            $id = cadastrarAluno($nome, $cpf, $email,$celular,$foto);

            // Devolver mensagem
            header("Location:../view/cadastrar-aluno.php?msg=$id");
        } else {
            // Alterar dados de Aluno
            $id_aluno = mysqli_fetch_array(pesquisarAlunoPorCPF($cpf))["id"];
            $id = alterarAluno($id_aluno, $nome, $cpf, $email,$celular,$foto);

            // Devolver mensagem
            header("Location:../view/cadastrar-aluno.php?msg=Aluno $id alterado com sucesso.");
        }
        
    } else {
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-aluno.php?msg=$msg");
    }

?>