<?php
    require_once "conexaoBD.php";
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
    function alterarInstrutor ($nome, $cpf, $sexo,$id_instrutor) {

        $conexao = conectarBD();   
        

        // Montar SQL
        $sql = "UPDATE instrutor SET "
        . "nome = '$nome', "
        . "cpf = '$cpf', "
        . "sexo = '$sexo', "
        . "WHERE id_instrutor = $id_instrutor";
    
        mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
        
        return $id_instrutor;
    }
    
    function excluirInstrutor ( $id ) {
        $sql = "DELETE FROM instrutor WHERE id = $id";
    
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