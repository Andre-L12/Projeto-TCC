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

?>