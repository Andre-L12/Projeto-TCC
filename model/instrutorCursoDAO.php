<?php
require_once "conexaoBD.php";
function vincularInstrutorCurso($instrutor, $curso, $dias_semana){
    $conexao = conectarBD();

    $query1 = "SELECT * FROM curso_instrutor WHERE cpf_instutor='$instrutor' and sigla_curso='$curso';";
    $select1 = mysqli_query($conexao,$query1);
    $qtd = mysqli_num_rows($select1);

    if ($qtd == 0){
        // Vinculo ainda não existe na tabela.
        $sql = "INSERT INTO curso_instrutor (cpf_instrutor, sigla_curso, dias_semana) VALUES ('$instrutor', '$curso', '$dias_semana')";

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

?>