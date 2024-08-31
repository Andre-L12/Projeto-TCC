<?php 
require "conexaoBD.php";
static $conexão;
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
function ComboBoxAluno() {
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
function ComboBoxInstrutor() {
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
function ComboBoxVeiculo() {
    $sql = "SELECT * FROM veiculo";
    $conexao = conectarBD();    
    $resultado = mysqli_query($conexao, $sql );

    $options = "";
    while (  $registro = mysqli_fetch_assoc($resultado)  ) {
        // Pegar os campos do REGISTRO
        $placa = $registro["placa"];
        $modelo = $registro["modelo"];

        $options = $options . "<OPTION value='$placa'>$modelo</OPTION>";
    }

    return $options;
}