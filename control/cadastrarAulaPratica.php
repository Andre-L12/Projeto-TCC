<?php
    require_once "funçoesUteis.php";
    require_once "../model/aulaPraticaDAO.php";

    // Receber os campos POST:
    $id_processo = $_POST["processo"];
    $id_instrutor = $_POST["instrutor"];
    $id_veiculo = $_POST["veiculo"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $obrigatoria = $_POST["obrigatoria"];

    // Validação de dados:
    $msg = validarAula($id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria);

    if (empty($msg)){
        // Inserir Aula
        $id = cadastrarAulaPratica($id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria);
        
        // Devolver mensagem
        header("Location:../view/cadastrar-aula.php?msg=$id");

    } else {
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-aula.php?msg=$msg");
    }
    
    
?>