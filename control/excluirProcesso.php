<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/processoDAO.php';
        require_once "../model/aulaPraticaDAO.php";
        $id = $_GET["id"];
        $resultado =pesquisarAulaPorProcesso($id);
        $qtd=mysqli_num_rows($resultado);
        if($qtd==0){
            excluirProcesso($id);
            header("Location:../view/pesquisar-processo.php");
        }
        else{
            $msg="O Processo não pode ser excluído pois já foi vinculado a uma aula!";
            header("Location:../view/pesquisar-processo.php?msg=$msg");
        }
    }
    else {
        header("Location:../view/pesquisar-processo.php?id=$id"); 
    }
?>