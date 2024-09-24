<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/processoDAO.php';

        $id = $_GET["id"];
        excluirProcesso($id);
        header("Location:../view/pesquisar-processo.php");
    }
    else {
        header("Location:../view/pesquisar-processo.php?id=$id"); 
    }
?>