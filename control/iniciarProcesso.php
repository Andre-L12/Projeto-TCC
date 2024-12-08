<?php
    
    require "../model/processoDAO.php";
    require "../model/cursoDAO.php";
    require "funçoesUteis.php";

    // Receber os campos POST:
    $acao = $_POST["btnCadastrar"];

    $curso = [$_POST["curso"]];
    $aluno = $_POST["aluno"];
    $data_inicio = $_POST["data_inicio"];

    $categoria = mysqli_fetch_array(pesquisarCursoPorSigla($curso[0]))["categoria"];

    if ($categoria == "AB"){
        $curso = [substr($curso[0], 0, 2)."A", substr($curso[0], 0, 2)."B"];
    }

    foreach ($curso as $cursoSelecionado){
        // Validação de dados:
        $msgErro = validarPreocesso($cursoSelecionado, $aluno, $data_inicio);
        // $msgErro = "Curso 1: " . $curso[0] . "<br>Curso 2: " . $curso[1];
        
        if (empty($msgErro)){

            $id = "";

            if ($acao == "Cadastrar"){
                // Iniciar Processo
                $id .= iniciarProcesso($cursoSelecionado,$aluno,$data_inicio) . "<br>";
                
            } else {
                // Alterar dados de Processo
                // - Pegando id com base no aluno:
                $id_processo = pegaIDProcesso($aluno); // Dá erro se um aluno tiver mais que um processo
                $id = alterarProcesso($cursoSelecionado, $aluno, $data_inicio, $id_processo);

                // Devolver mensagem
                header("Location:../view/cadastrar-processo.php?msg=Processo $id alterado com sucesso.");
            }

            // Devolver mensagem
            header("Location:../view/cadastrar-processo.php?msg=$id");

            
        } else {
            // Devolver mensagem ERRO
            header("Location:../view/cadastrar-processo.php?msg=$msgErro");
        }
    }

    
        

        
?>