<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/instrutorDAO.php';

        $id = $_GET["id"];

        // Exlcuir Instrutor
        excluirInstrutor($id);

        // Voltar para a tela Pesquisar
        header("Location:../view/pesquisar-instrutor.php");
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/pesquisar-instrutor.php"); // Fazer voltar para consultar-instrutor.php?id=cpf
    }
?>