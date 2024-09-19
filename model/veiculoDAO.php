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
    function alterarVeiculo ($sigla_categoria,$adaptado,$placa,$marca,$modelo) {

        $conexao = conectarBD();   
        
    
        // Montar SQL
        $sql = "UPDATE veiculo SET "
        . "sigla_categoria = '$sigla_categoria', "
        . "adaptado = '$adaptado', "
        . "marca = '$marca', "
        . "modelo = '$modelo'"
        . "WHERE placa = $placa";
    
        mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
        
        return $placa;
    }
    
    function excluirVeiculo ( $placa ) {
        $sql = "DELETE FROM veiculo WHERE placa = $placa";
    
        $conexao = conectarBD();  
        mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    
    }
    function pesquisarVeiculo($pesq) {
        $conexao = conectarBD(); 
        $sql = "SELECT * FROM veiculo WHERE placa LIKE '%$pesq%' ";
        $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
        return $res;
        
    }
    function pesquisar ($pesq, $tipo) {
    
        $conexao = conectarBD(); 
    
        $sql = "SELECT * FROM veiculo WHERE ";
        switch ($tipo) {
            case 1: // Por modelo
                    $sql = $sql . "modelo LIKE '$pesq%' ";
                    break;
            case 2: // Por marca
                    $sql = $sql . "marca = '$pesq' ";
                    break;
            case 3: // Por adaptado
                $sql = $sql . "adaptado = '$pesq' ";
                break;
            case 4: // Por placa
                $sql = $sql . "placa = '$pesq' ";
        }
    
        $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
        return $res;
    }
    
    function pesquisarVeiculoPorModelo ($pesq) {
        return pesquisar($pesq,1);
    }
    
    //function pesquisarClientePorEstado ($pesq) {
       // return pesquisar($pesq,2);}
    
    function pesquisarVeiculoPorMarca ($pesq) {
        return pesquisar($pesq,2);
    }
    
    function pesquisarVeiculoPorAdaptado ($pesq) {
        return pesquisar($pesq,3);
    }
    function pesquisarVeiculoPorPlaca ($pesq) {
        return pesquisar($pesq,4);
    }
?>