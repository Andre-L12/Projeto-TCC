<?php
    if ( isset($_GET["id"]) ) {

        require_once '../model/AlunoDAO.php';

        $id = $_GET["id"];

        // Exlcuir Aluno
        excluirAluno($id);

        // Voltar para a tela Pesquisar
        header("Location:../view/pesquisar-aluno.php");
    }
    else {
        // ERRO: Voltar para tela Consultar
        header("Location:../view/pesquisar-aluno.php"); // Fazer voltar para consultar-aluno.php?id=cpf
    }
?>