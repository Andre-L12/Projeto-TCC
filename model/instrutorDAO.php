<?php
    require_once "conexaoBD.php";
    function criarInstrutor($nome, $cpf, $sexo, $dias_semana){
        $conexao = conectarBD();

        $query1="SELECT cpf FROM instrutor WHERE cpf='$cpf'";
        $select1=mysqli_query($conexao,$query1);  
        $qtd=mysqli_num_rows($select1);

        if($qtd == 0){
            $sql = "INSERT INTO instrutor (nome, cpf, sexo, dias_semana) VALUES ('$nome', '$cpf', '$sexo', '$dias_semana')";
            $select2 = mysqli_query($conexao,$sql);
            $id = mysqli_insert_id($conexao);  
            
            if($select2){
                $mensagem = "Intrutor $id inserido com sucesso.";
            }
            else{
                $mensagem = "Não foi possível realizar o cadastro.";
            }
        } else {
            $mensagem = "Esse instrutor já existe.";
        }

        return $mensagem; 
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
    function alterarInstrutor ($nome, $cpf, $sexo, $dias_semana, $id_instrutor) {

        $conexao = conectarBD();   
        
        // Montar SQL
        $sql = "UPDATE instrutor SET "
        . "nome = '$nome', "
        . "cpf = '$cpf', "
        . "sexo = '$sexo', "
        . "dias_semana = '$dias_semana' "
        . "WHERE id_instrutor = $id_instrutor";
    
        mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) ); // Inserir no banco
        
        return $id_instrutor;
    }
    
    function excluirInstrutor ( $id ) {
        $sql = "DELETE FROM instrutor WHERE id_instrutor = $id";
    
        $conexao = conectarBD();  
        mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    
    }
    function pesquisarInstrutor($pesq, $tipo) {
    
        $conexao = conectarBD(); 
    
        $sql = "SELECT * FROM instrutor WHERE ";
        switch ($tipo) {
            case 1: // Por nome
                    $sql = $sql . "nome LIKE '$pesq%' ";
                    break;
            case 2: // Por CPF
                    $sql = $sql . "cpf = '$pesq' ";
                    break;
            case 3: // Por ID
                $sql = $sql . "id_instrutor = '$pesq' ";
        }
    
        $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
        return $res;
    }
    
    function pesquisarInstrutorPorNome ($pesq) {
        return pesquisarInstrutor($pesq,1);
    }
    
    //function pesquisarClientePorEstado ($pesq) {
       // return pesquisar($pesq,2);}
    
    function pesquisarInstrutorPorCPF ($pesq) {
        return pesquisarInstrutor($pesq,2);
    }
    
    function pesquisarInstrutorPorID ($pesq) {
        return pesquisarInstrutor($pesq,3);
    }
    // function excluirInstutor{

    // }

    // function alterarInstutor{

    // }


?>