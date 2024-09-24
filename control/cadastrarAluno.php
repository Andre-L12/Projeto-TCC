<?php
    require "funçoesUteis.php";
    require "../model/AlunoDAO.php";

    $acao = $_POST["btnCadastrar"];

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];

    $foto = $_FILES["foto"];

    // Validação de dados:
    $msg = validarAluno($nome, $cpf,$email);

    // Validação da imagem:
    // Se for cadastrar, validar.
    if ($acao == "Cadastrar"){
        $msg = validarImagem($foto);
    } else {
        // Se for alterar, validar só se houver imagem.
        if ($foto['error'] == UPLOAD_ERR_NO_FILE) {
            // Nenhum arquivo enviado
            $foto = null;
        } else {
            $msgErro = $msgErro . validarImagem($foto);
        }
    }


    if(empty($msg)){
        if ($acao == "Cadastrar"){
            //Inserindo dados no banco
            $id = cadastrarAluno($nome, $cpf, $email,$celular,$foto);

            //Devolvendo mensagem
            header("Location:../view/cadastrar-aluno.php?msg=$id");
        } else {
            $id_aluno = mysqli_fetch_array(pesquisarAlunoPorCPF($cpf))["id"];
            $id = alterarAluno($id_aluno, $nome, $cpf, $email,$celular,$foto);

            header("Location:../view/cadastrar-aluno.php?msg=Aluno $id alterado com sucesso.");
        }
        
    } else {
        header("Location:../view/cadastrar-aluno.php?msg=$msg");
    }

?>