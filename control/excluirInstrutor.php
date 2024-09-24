<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/instrutorDAO.php';

        $id = $_GET["id"];
        excluirInstrutor($id);
        header("Location:../view/pesquisar-instrutor.php");
    }
    else {
        header("Location:../view/pesquisar-instrutor.php"); // Fazer voltar para consultar-instrutor.php?id=cpf
    }
?>