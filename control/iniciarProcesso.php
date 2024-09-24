<?php
    
    require "../model/processoDAO.php";
    require "funçoesUteis.php";

    // Receber os campos POST:
    $acao = $_POST["btnCadastrar"];

    $curso = $_POST["curso"];
    $aluno = $_POST["aluno"];
    $data_inicio = $_POST["data_inicio"];

    // Validação de dados:
    $msgErro = validarPreocesso($curso, $aluno, $data_inicio);
    
    if (empty($msgErro)){

        if ($acao == "Cadastrar"){
            // Iniciar Processo
            $id = iniciarProcesso($curso,$aluno,$data_inicio);
        
            // Devolver mensagem
            header("Location:../view/cadastrar-processo.php?msg=$id");
        } else {
            // Alterar dados de Processo
            // - Pegando id com base no aluno:
            $id_processo = pegaIDProcesso($aluno); // Dá erro se um aluno tiver mais que um processo
            $id = alterarProcesso($curso, $aluno, $data_inicio, $id_processo);

            // Devolver mensagem
            header("Location:../view/cadastrar-processo.php?msg=Processo $id alterado com sucesso.");
        }

        
    } else {
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-processo.php?msg=$msgErro");
    }
        

        
?>