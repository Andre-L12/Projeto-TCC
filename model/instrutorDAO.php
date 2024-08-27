<?php
    require "conexaoBD.php";
    function criarInstrutor($nome, $cpf, $sexo){
        $conexao = conectarBD();
        $sql = "INSERT INTO instrutor (nome, cpf, sexo) VALUES ('$nome', '$cpf', '$sexo')";

        mysqli_query($conexao, $sql);

        $id = mysqli_insert_id($conexao);

        return $id; 
    }

    // function excluirInstutor{

    // }

    // function alterarInstutor{

    // }


?>