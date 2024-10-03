<?php
    require "funçoesUteis.php";
    require "../model/instrutorCursoDAO.php";

    // Receber os campos POST:
    $instrutor = $_POST["instrutor"];
    $curso = $_POST["curso"];
    $veiculo = $_POST["veiculo"];
    
    // Validação de dados:
    $msg = validarInstrutorCurso($instrutor, $curso, $veiculo);

    if (empty($msg)){
        // Inserir vínculo
        $msgBanco = vincularInstrutorCurso($instrutor, $curso, $veiculo);
        
        // Devolver mensagem
        header("Location:../view/cadastrar-instrutor-curso.php?msg=$msgBanco");
    } else {
        
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-instrutor-curso.php?msg=$msg");
    }
    

?>