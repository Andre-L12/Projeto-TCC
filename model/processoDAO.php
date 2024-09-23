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
function comboBoxProcessoAluno($cpf){
        
    $conexao = conectarBD();

    $sql = "SELECT * FROM processo where cpf_aluno='$cpf'";
    $resultado = mysqli_query($conexao, $sql );

    $options = "";
    while (  $registro = mysqli_fetch_assoc($resultado)  ) {
        // Pegar os campos do REGISTRO
        $id_processo = $registro["id_processo"];
        $curso = $registro["curso"];
        $data = $registro["data_inicio"];
        $options = $options . "<br> <strong>Processo_ID:</strong> $id_processo <br> <strong>curso:</strong> $curso <br> <strong> Data de Início:</strong> $data<br>";
    }

    return $options;
}
function pegaIDProcesso($cpf){
    $conect = conectarBD();
    $query1 = "SELECT * FROM processo WHERE cpf_aluno='$cpf';";
    $select1 = mysqli_query($conect,$query1); 
    $registro = mysqli_fetch_assoc($select1);
        // Pegar os campos do REGISTRO
        $id_processo = $registro["id_processo"];
    return $id_processo;
}
function pesquisarProcessos ($pesq, $tipo) {

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
    return pesquisarProcessos($pesq,1);
}

//function pesquisarClientePorEstado ($pesq) {
   // return pesquisar($pesq,2);}

function pesquisarProcessoPorCurso ($pesq) {
    return pesquisarProcessos($pesq,2);
}

function pesquisarProcessoPorID ($pesq) {
    return pesquisarProcessos($pesq,3);
}

function excluirProcesso($id){
    $sql = "DELETE FROM processo WHERE id_processo = $id";

    $conexao = conectarBD();  
    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    //return
}