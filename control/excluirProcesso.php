<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/processoDAO.php';

        $id = $_GET["id"];

        // Exlcuir Processo
        excluirProcesso($id);

        // Voltar para a tela Pesquisar
        header("Location:../view/pesquisar-processo.php");
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/consultar-processo.php?id=$id"); 
    }
?>