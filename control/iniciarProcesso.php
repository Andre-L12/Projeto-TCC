<?php
    
    require "../model/processoDAO.php";
    require "funçoesUteis.php";

    $acao = $_POST["btnCadastrar"];

    $curso = $_POST["curso"];
    $aluno = $_POST["aluno"];
    $data_inicio = $_POST["data_inicio"];

    $msgErro = validarPreocesso($curso, $aluno, $data_inicio);
    
    if (empty($msgErro)){

        if ($acao == "Cadastrar"){
            //Inserindo dados no banco
            $id = iniciarProcesso($curso,$aluno,$data_inicio);
        
            //Devolvendo mensagem
            header("Location:../view/cadastrar-processo.php?msg=$id");
        } else {
            $id_processo = pegaIDProcesso($aluno); // Dá erro se um aluno tiver mais que um processo
            $id = alterarProcesso($curso, $aluno, $data_inicio, $id_processo);

            header("Location:../view/cadastrar-processo.php?msg=Processo $id alterado com sucesso.");
        }

        
    } else {
        //Devolvendo mensagem
        header("Location:../view/cadastrar-processo.php?msg=$msgErro");
    }
        

        
?>