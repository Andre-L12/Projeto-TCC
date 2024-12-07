<?php
    require "conexaoBD.php";
    
    //Função para criar veículo
    function criarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano){
        $conexao = conectarBD();

        $query1="SELECT placa FROM veiculo WHERE placa='$placa'";
        $select1=mysqli_query($conexao,$query1);  
        $qtd=mysqli_num_rows($select1);

        if($qtd == 0){
            $sql = "INSERT INTO veiculo (sigla_categoria, adaptado, placa, marca, modelo, ano) VALUES ('$sigla', '$adaptado', '$placa', '$marca', '$modelo', '$ano')";
            $select2=mysqli_query($conexao,$sql);

            if($select2){
                $mensagem = "Veículo $placa inserido com sucesso.";
            }
            else{
                $mensagem = "Não foi possível realizar o cadastro.";
            }
        } else {
            $mensagem ="Esse veículo já existe.";
        }

        return $mensagem; 

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
    function pesquisarInstrutorVinculadoPorPlaca($placa){
        $sql="SELECT 
            i.id_instrutor,
            i.nome AS nome_instrutor,
            i.cpf AS cpf_instrutor,
            i.sexo AS sexo_instrutor,
            i.dias_semana AS dias_disponiveis
        FROM 
            Curso_Instrutor ci
        JOIN 
            Instrutor i ON ci.id_instrutor = i.id_instrutor
        WHERE 
            ci.id_veiculo = '$placa'; 
        ";
        $conexao = conectarBD();
        $resultado = mysqli_query($conexao, $sql);
    
        $instrutor = "";
        while ($registro = mysqli_fetch_assoc($resultado)) {
            // Pegar os campos do REGISTRO
            $nome_instrutor= $registro["nome_instrutor"];
    
            $instrutor = $instrutor . " $nome_instrutor";
        }
        return $instrutor;
    }
    function alterarVeiculo ($sigla_categoria,$adaptado,$placa,$marca,$modelo,$ano) {

        $conexao = conectarBD();   
        
    
        // Montar SQL
        $sql = "UPDATE veiculo SET "
        . "sigla_categoria = '$sigla_categoria', "
        . "adaptado = $adaptado, "
        . "marca = '$marca', "
        . "modelo = '$modelo',"
        . "ano = '$ano'"
        . "WHERE placa = '$placa'";
    
        mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
        
        return $placa;
    }
    
    function excluirVeiculo ( $placa ) {
        $sql = "DELETE FROM veiculo WHERE placa = '$placa'";
    
        $conexao = conectarBD();  
        mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    
    }

    function pesquisarVeiculo ($pesq, $tipo) {
    
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
        return pesquisarVeiculo($pesq,1);
    }
    
    //function pesquisarClientePorEstado ($pesq) {
       // return pesquisar($pesq,2);}
    
    function pesquisarVeiculoPorMarca ($pesq) {
        return pesquisarVeiculo($pesq,2);
    }
    
    function pesquisarVeiculoPorAdaptado ($pesq) {
        return pesquisarVeiculo($pesq,3);
    }
    function pesquisarVeiculoPorPlaca ($pesq) {
        return pesquisarVeiculo($pesq,4);
    }
?>