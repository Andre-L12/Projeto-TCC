<?php
    if ((isset($_GET["id"])) &&  ( isset($_GET["status"])) &&  ( isset($_GET["link"]))) {

        require_once '../model/aulaPraticaDAO.php';

        $id = $_GET["id"];
        $status = $_GET["status"];
        $link_retorno = $_GET["link"];

        // Exlcuir Aluno
        alterarStatusAula($id, $status);

        // Voltar para a tela Pesquisar
        header("Location:$link_retorno?id=$id");
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:$link_retorno?id=$id"); 
    }
?>