<?php
    if ( isset($_POST["id"]) ) {

        require_once '../model/funcoesBD.php';

        $id = $_POST["id"];
            excluirAviso($id);
            header("Location:../view/menu-funcionario.php");
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/menu-funcionario.php?id=$id"); 
    }
?>