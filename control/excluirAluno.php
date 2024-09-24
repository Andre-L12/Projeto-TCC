<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/AlunoDAO.php';

        $id = $_GET["id"];
        excluirAluno($id);
        header("Location:../view/pesquisar-aluno.php");
    }
    else {
        header("Location:../view/pesquisar-aluno.php"); // Fazer voltar para consultar-aluno.php?id=cpf
    }
?>