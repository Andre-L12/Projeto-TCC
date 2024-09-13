<?php 
require_once "conexaoBD.php";
static $conexao;
function comboBoxCurso() {
    $sql = "SELECT * FROM curso";
    $conexao = conectarBD();    
    $resultado = mysqli_query($conexao, $sql );

    $options = "";
    while (  $registro = mysqli_fetch_assoc($resultado)  ) {
        // Pegar os campos do REGISTRO
        $sigla = $registro["sigla"];
        $descricao = $registro["descricao"];

        $options = $options . "<OPTION value='$sigla'>$descricao</OPTION>";
    }

    return $options;
}
function comboBoxAluno() {
    $sql = "SELECT * FROM aluno";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql );

    $options = "";
    while (  $registro = mysqli_fetch_assoc($resultado)  ) {
        // Pegar os campos do REGISTRO
        $cpf = $registro["cpf"];
        $nome = $registro["nome"];

        $options = $options . "<OPTION value='$cpf'>$nome</OPTION>";
    }
    return $options;
}
function comboBoxInstrutor() {
    $sql = "SELECT * FROM instrutor";
    $conexao = conectarBD();    
    $resultado = mysqli_query($conexao, $sql );

    $options = "";
    while (  $registro = mysqli_fetch_assoc($resultado)  ) {
        // Pegar os campos do REGISTRO
        $cpf = $registro["cpf"];
        $nome = $registro["nome"];

        $options = $options . "<OPTION value='$cpf'>$nome</OPTION>";
    }

    return $options;
}
