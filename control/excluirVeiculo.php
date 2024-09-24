<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/veiculoDAO.php';

        $id = $_GET["id"];

        // Exlcuir Veículo
        excluirVeiculo($id);

        // Voltar para a tela Pesquisar
        header("Location:../view/pesquisar-veiculo.php");
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/consultar-veiculo.php?id=$id"); 
    }
?>