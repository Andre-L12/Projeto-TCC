<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/veiculoDAO.php';
        require_once "../model/aulaPraticaDAO.php";

        $id = $_GET["id"];
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
        
    }
    else {
        header("Location:../view/pesquisar-veiculo.php?id=$id"); 
    }
?>