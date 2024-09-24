<?php
require_once "conexaoBD.php";
static $conexão;
function iniciarProcesso($curso,$aluno,$data_inicio){
    $conect = conectarBD();
    
    $query1 = "SELECT * FROM processo WHERE cpf_aluno='$aluno' and curso='$curso';";
    $select1 = mysqli_query($conect,$query1);  
    $qtd = mysqli_num_rows($select1);

    if ($qtd == 0){
        $query2="INSERT INTO `banco_cfc`.`processo` (`curso`, `cpf_aluno`, `data_inicio`) VALUES ('$curso', '$aluno', '$data_inicio');";

        $select2 = mysqli_query($conect,$query2);
        $id = mysqli_insert_id($conect);
        
        if ($select2){
            $mensagem="Processo $id iniciado.";
        }
        else {
            $mensagem="Não foi possível iniciar o processo.";
        }
    }
    else {
        $mensagem="Esse processo já existe.";
    }
    return $mensagem;
}

function alterarProcesso($curso, $aluno, $data_inicio, $id_processo){
    $conexao = conectarBD();

    // Montar SQL
    $sql = "UPDATE processo SET "
    . "curso = '$curso', "
    . "cpf_aluno = '$aluno', "
    . "data_inicio = '$data_inicio' "
    . "WHERE id_processo = $id_processo";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) ); // Inserir no banco
    
    return $id_processo;
}
function pegaIDProcesso($aluno){
    $conect = conectarBD();
    $query1 = "SELECT * FROM processo WHERE cpf_aluno='$aluno';";
    $select1 = mysqli_query($conect,$query1); 
    $registro = mysqli_fetch_assoc($select1);
    // Pegar os campos do REGISTRO
    $id_processo = $registro["id_processo"];
    return $id_processo;
}
function pesquisar($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM processo WHERE ";
    switch ($tipo) {
        case 1: // Por nome
                $sql = $sql . "cpf_aluno LIKE '$pesq%' ";
                break;
        case 2: // Por CPF
                $sql = $sql . "curso = '$pesq' ";
                break;
        case 3: // Por ID
            $sql = $sql . "id_processo = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisarProcessoPorCPFAluno ($pesq) {
    return pesquisar($pesq,1);
}

//function pesquisarClientePorEstado ($pesq) {
   // return pesquisar($pesq,2);}

function pesquisarProcessoPorCurso ($pesq) {
    return pesquisar($pesq,2);
}

function pesquisarProcessoPorID ($pesq) {
    return pesquisar($pesq,3);
}