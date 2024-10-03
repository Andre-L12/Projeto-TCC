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
        $id = $registro["id_aluno"];
        $nome = $registro["nome"];

        $options = $options . "<OPTION value='$id'>$nome</OPTION>";
    }
    return $options;
}
function comboBoxVeiculo() {
    $sql = "SELECT * FROM veiculo";
    $conexao = conectarBD();    
    $resultado = mysqli_query($conexao, $sql );

    $options = "";
    while (  $registro = mysqli_fetch_assoc($resultado)  ) {
        // Pegar os campos do REGISTRO
        $placa = $registro["placa"];
        $modelo = $registro["modelo"];
        $marca = $registro["marca"];

        $options = $options . "<OPTION value='$placa'>$marca $modelo - $placa</OPTION>";
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
        $id = $registro["id_instrutor"];
        $nome = $registro["nome"];

        $options = $options . "<OPTION value='$id'>$nome</OPTION>";
    }

    return $options;
}
