<?php
    require "conexaoBD.php";
    function criarInstrutor($nome, $cpf, $sexo){
        $conexao = conectarBD();
        $sql = "INSERT INTO instrutor (nome, cpf, sexo) VALUES ('$nome', '$cpf', '$sexo')";

        mysqli_query($conexao, $sql);

        return $nome; 
    }

    function instrutorExiste($cpf){
        $conexao = conectarBD();
        $sql = "SELECT * FROM `instrutor` WHERE cpf='$cpf';";

        $selecao = mysqli_query($conexao,$sql);
        $resultado = mysqli_fetch_assoc($selecao);
        $qtd = (int) mysqli_num_rows($selecao);

        if ($qtd !== 0){
            return true;
        } else {
            return false;
        }
    }

    // function excluirInstutor{

    // }

    // function alterarInstutor{

    // }


?>