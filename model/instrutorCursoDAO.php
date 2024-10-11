<?php
require_once "conexaoBD.php";
function vincularInstrutorCurso($instrutor, $curso, $veiculo){
    $conexao = conectarBD();

    $query1 = "SELECT * FROM curso_instrutor WHERE id_instrutor='$instrutor' and id_curso='$curso';";
    $select1 = mysqli_query($conexao,$query1);
    $qtd = mysqli_num_rows($select1);

    if ($qtd == 0){
        // Vinculo ainda não existe na tabela.
        $sql = "INSERT INTO curso_instrutor (id_veiculo, id_curso, id_instrutor) VALUES ('$veiculo','$curso', '$instrutor')";

        $select = mysqli_query($conexao, $sql);
        $id = mysqli_insert_id($conexao);

        if ($select){
            $mensagem="Vínculo $id realizado.";
        }
        else {
            $mensagem="Não foi possível criar o vínculo.";
        }
    }
    else {
        $mensagem="Esse vículo já existe.";
    }
    return $mensagem;
}

function excluirInstrutorCurso($id_instrutor_curso){
    $sql = "DELETE FROM curso_instrutor WHERE id = $id_instrutor_curso";

    $conexao = conectarBD();  
    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    // return
}

function pesquisarInstrutorCurso($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM curso_instrutor WHERE ";
    switch ($tipo) {
        case 1: // Por ID do curso
                $sql = $sql . "id_curso = '$pesq' ";
                break;
        case 2: // Por ID do instrutor
                $sql = $sql . "id_instrutor = '$pesq' ";
                break;
        case 3: // Por ID do curso_instrutor
            $sql = $sql . "id = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisarVinculoPorCurso ($pesq) {
    return pesquisarInstrutorCurso($pesq, 1);
}

function pesquisarVinculoPorInstrutor ($pesq) {
    return pesquisarInstrutorCurso($pesq, 2);
}

function pesquisarVinculoPorID ($pesq) {
    return pesquisarInstrutorCurso($pesq, 3);
}

?>