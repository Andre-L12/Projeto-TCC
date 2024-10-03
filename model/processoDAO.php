<?php
require_once "conexaoBD.php";
static $conexão;
function iniciarProcesso($curso,$aluno,$data_inicio){
    $conect = conectarBD();
    
    $query1 = "SELECT * FROM processo WHERE id_aluno='$aluno' and id_curso='$curso';";
    $select1 = mysqli_query($conect,$query1);  
    $qtd = mysqli_num_rows($select1);

    if ($qtd == 0){
        $query2="INSERT INTO `banco_cfc`.`processo` (`data_inicio`, `id_aluno`, `id_curso`) VALUES ('$data_inicio', '$aluno', '$curso');";

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
function comboBoxProcessoAluno($id){ //Chamar essa função de combobox mesmo?
        
    $conexao = conectarBD();

    $sql = "SELECT * FROM processo where id_aluno='$id'";
    $resultado = mysqli_query($conexao, $sql );

    $options = "";
    while (  $registro = mysqli_fetch_assoc($resultado)  ) {
        // Pegar os campos do REGISTRO
        $id_processo = $registro["id_processo"];
        $curso = $registro["id_curso"];
        $data = $registro["data_inicio"];
        $options = $options . "<br> <strong>Processo_ID:</strong> $id_processo <br> <strong>curso:</strong> $curso <br> <strong> Data de Início:</strong> $data<br>";
    }

    return $options;
}

function alterarProcesso($curso, $aluno, $data_inicio, $id_processo){
    $conexao = conectarBD();

    // Montar SQL
    $sql = "UPDATE processo SET "
    . "data_inicio = '$data_inicio', "
    . "id_curso = '$curso', "
    . "id_aluno = '$aluno' "
    . "WHERE id_processo = $id_processo";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) ); // Inserir no banco
    
    return $id_processo;
}
function pegaIDProcesso($aluno){
    $conect = conectarBD();
    $query1 = "SELECT * FROM processo WHERE id_aluno='$aluno';";
    $select1 = mysqli_query($conect,$query1); 
    $registro = mysqli_fetch_assoc($select1);
    // Pegar os campos do REGISTRO
    $id_processo = $registro["id_processo"];
    return $id_processo;
}
function pesquisarProcessos($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM processo WHERE ";
    switch ($tipo) {
        case 1: // Por CPF aluno
                $sql = 
                "SELECT p.*
                FROM `Processo` p
                JOIN `Aluno` a ON p.id_aluno = a.id_aluno
                WHERE a.cpf = '$pesq';";
                break;
        case 2: // Por curso
                $sql = $sql . "id_curso = '$pesq' ";
                break;
        case 3: // Por ID do processo
            $sql = $sql . "id_processo = '$pesq' ";
            break;
        case 4: //Por ID do Aluno
            $sql = $sql . "id_aluno = '$pesq'";
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

function pesquisarProcessoPorIDAluno ($pesq) {
    return pesquisarProcessos($pesq,4);
}

function excluirProcesso($id){
    $sql = "DELETE FROM processo WHERE id_processo = $id";

    $conexao = conectarBD();  
    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    //return
}