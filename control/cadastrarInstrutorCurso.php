<?php
    require "funçoesUteis.php";
    require "../model/instrutorCursoDAO.php";

    // Receber os campos POST:
    $instrutor = $_POST["instrutor"];
    $curso = $_POST["curso"];

    $dias_semana = "";

    // - Checkbox dias da semana:

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

    if (isset($_POST["domingo"])){
        $dias_semana .= "1";
    } else {
        $dias_semana .= "0";
    }

    // Validação de dados:
    $msg = validarInstrutorCurso($instrutor, $curso, $dias_semana);

    if (empty($msg)){
        // Inserir vínculo
        $msgBanco = vincularInstrutorCurso($instrutor, $curso, $dias_semana);
        
        // Devolver mensagem
        header("Location:../view/cadastrar-instrutor-curso.php?msg=$msgBanco");
    } else {
        
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-instrutor-curso.php?msg=$msg");
    }
    

?>