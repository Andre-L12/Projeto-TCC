<?php

require_once "conexaoBD.php";
static $conexao;

function comboBoxCurso()
{
    $sql = "SELECT * FROM curso";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql);

    $options = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $sigla = $registro["sigla"];
        $descricao = $registro["descricao"];

        $options = $options . "<OPTION value='$sigla'>$descricao</OPTION>";
    }

    return $options;
}
function comboBoxAluno()
{
    $sql = "SELECT * FROM aluno";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql);

    $options = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $id = $registro["id_aluno"];
        $nome = $registro["nome"];

        $options = $options . "<OPTION value='$id'>$nome</OPTION>";
    }
    return $options;
}

function comboBoxAlunoCPF()
{
    $sql = "SELECT * FROM aluno";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql);

    $options = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $cpf = $registro["cpf"];
        $nome = $registro["nome"];

        $options = $options . "<OPTION value='$cpf'>$nome</OPTION>";
    }
    return $options;
}

function comboBoxVeiculo()
{
    $sql = "SELECT * FROM veiculo";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql);

    $options = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $placa = $registro["placa"];
        $modelo = $registro["modelo"];
        $marca = $registro["marca"];

        $options = $options . "<OPTION value='$placa'>$marca $modelo - $placa</OPTION>";
    }

    return $options;
}
function comboBoxInstrutor()
{
    $sql = "SELECT * FROM instrutor";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql);

    $options = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $id = $registro["id_instrutor"];
        $nome = $registro["nome"];

        $options = $options . "<OPTION value='$id'>$nome</OPTION>";
    }

    return $options;
}
function pesquisarDatas($id) {
    require_once "processoDAO";
    require_once "aulaPraticaDAO.php";
    $conexao =conectarBD();
    $processo= pegaIDProcesso($id);
    $aulas=pesquisarAulaPorProcesso($processo);
    $datas="";
    while ($resultado = mysqli_fetch_assoc($aulas)){
        $data_aula = $resultado['data'];
        $datas[] = $data_aula; // Armazena cada data no array
    }

    return $datas; // Retorna o array com as datas
}


// Consultas com JOIN =============================

function pesquisarVeiculoPorProcesso($id_processo)
{
    $conexao = conectarBD();
    $sql =
        "SELECT V.placa, V.sigla_categoria, V.adaptado, V.marca, V.modelo, V.modelo, V.ano
    FROM Veiculo V
    JOIN Curso C ON V.sigla_categoria = C.categoria
    JOIN Processo P ON C.sigla = P.id_curso
    WHERE P.id_processo = '$id_processo';";

    $resultado = mysqli_query($conexao, $sql);

    return $resultado;
}
