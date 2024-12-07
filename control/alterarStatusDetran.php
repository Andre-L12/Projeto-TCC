<?php
    if ((isset($_GET["id"])) &&  ( isset($_GET["status"]))) {

        require_once '../model/aulaPraticaDAO.php';

        $id = $_GET["id"];
        $status = $_GET["status"];

        // Exlcuir Aluno
        alterarStatusAula($id, $status);

        // Voltar para a tela Pesquisar
        header("Location:../view/consultar-aulaPratica.php?id=$id");
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/consultar-aulaPratica.php?id=$id"); 
    }
?>