<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/processoDAO.php';
        require_once "../model/aulaPraticaDAO.php";
        $id = $_GET["id"];
<<<<<<< HEAD
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
=======

        // Exlcuir Processo
        excluirProcesso($id);

        // Voltar para a tela Pesquisar
        header("Location:../view/pesquisar-processo.php");
>>>>>>> d35300ea00f1849f11a8ea286d2abba4dffbf7b7
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/consultar-processo.php?id=$id"); 
    }
?>