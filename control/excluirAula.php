<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/aulaPraticaDAO.php';

        $id = $_GET["id"];

        // Exlcuir Aluno
        excluirAulaPratica($id);

        // Voltar para a tela Pesquisar
        header("Location:../view/pesquisar-aulaPratica.php");
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/pesquisar-aulaPratica.php"); 
    }
?>