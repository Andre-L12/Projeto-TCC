<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/veiculoDAO.php';
        require_once "../model/aulaPraticaDAO.php";

        $id = $_GET["id"];
<<<<<<< HEAD
        $resultado =pesquisarAulaPorPlaca($id);
        $qtd=mysqli_num_rows($resultado);
        if($qtd==0){
            excluirVeiculo($id);
            header("Location:../view/pesquisar-veiculo.php");
        }
        else{
            $msg="O veículo não pode ser excluído pois já foi vinculado a uma aula!";
            header("Location:../view/pesquisar-veiculo.php?msg=$msg"); 
        }
        
=======

        // Exlcuir Veículo
        excluirVeiculo($id);

        // Voltar para a tela Pesquisar
        header("Location:../view/pesquisar-veiculo.php");
>>>>>>> d35300ea00f1849f11a8ea286d2abba4dffbf7b7
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/consultar-veiculo.php?id=$id"); 
    }
?>