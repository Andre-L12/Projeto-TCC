<?php
    require "funçoesUteis.php";
    require "../model/instrutorCursoDAO.php";

    $instrutor = $_POST["instrutor"];
    $curso = $_POST["curso"];

    $dias_semana = "";

    // Checkbox dias da semana:

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

    // Verificações:

    $msg = validarInstrutorCurso($instrutor, $curso, $dias_semana);

    if (empty($msg)){
        $msgBanco = vincularInstrutorCurso($instrutor, $curso, $dias_semana);
        header("Location:../view/cadastrar-instrutor-curso.php?msg=$msgBanco");
    } else {
        header("Location:../view/cadastrar-instrutor-curso.php?msg=$msg");
    }
    

?>