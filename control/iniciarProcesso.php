<?php
    
    require "../model/processoDAO.php";
    require "funçoesUteis.php";

    $curso = $_POST["curso"];
    $aluno = $_POST["aluno"];
    $data_inicio = $_POST["data_inicio"];

    $msgErro = validarPreocesso($curso, $aluno, $data_inicio);
    if (empty($msgErro)){
        //Inserindo dados no banco
        $id = iniciarProcesso($curso,$aluno,$data_inicio);
        
        //Devolvendo mensagem
        header("Location:../view/cadastrar-processo.php?msg= $id");
    } else {
        //Devolvendo mensagem
        header("Location:../view/cadastrar-processo.php?msg=$msgErro");
    }
        

        
?>