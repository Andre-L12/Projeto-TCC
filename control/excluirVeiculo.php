<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/veiculoDAO.php';

        $id = $_GET["id"];
        excluirVeiculo($id);
        header("Location:../view/pesquisar-veiculo.php");
    }
    else {
        header("Location:../view/pesquisar-veiculo.php?id=$id"); 
    }
?>