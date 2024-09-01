<?php
    require "conexaoBD.php";
    
    //Função para criar veículo
    function criarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano){
        $conexao = conectarBD();
        $sql = "INSERT INTO veiculo (sigla_categoria, adaptado, placa, marca, modelo, ano) VALUES ('$sigla', '$adaptado', '$placa', '$marca', '$modelo', '$ano')";

        mysqli_query($conexao, $sql);

        return $placa . " " . $marca . " " . $modelo;

    }

    //Função para verificar se veículo já está cadastrado
    function veiculoExiste($placa){
        $conexao = conectarBD();
        $sql = "SELECT * FROM `veiculo` WHERE placa='$placa';";

        $selecao = mysqli_query($conexao,$sql);
        $resultado = mysqli_fetch_assoc($selecao);
        $qtd = (int) mysqli_num_rows($selecao);

        if ($qtd != 0){
            return true;
        } else {
            return false;
        }
    }
?>