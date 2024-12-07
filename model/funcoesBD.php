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
function comboBoxAluno($id_selecionado = null) {
    $sql = "SELECT * FROM aluno";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql);

    $options = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $id = $registro["id_aluno"];
        $nome = $registro["nome"];

        if ($id == $id_selecionado){
            $options = $options . "<OPTION value='$id' selected>$nome</OPTION>";
        } else {
            $options = $options . "<OPTION value='$id'>$nome</OPTION>";
        }
    }
    return $options;
}

function comboBoxAlunoCPF(){
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
function comboBoxCardAvisos()
{
    $sql = "SELECT * FROM avisos ORDER BY data_aviso DESC";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql);

    $cards = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $titulo = $registro["titulo"];
        $conteudo = $registro["conteudo"];
        $data = $registro["data_aviso"];
        $id = $registro["id_aviso"];

        $cards = $cards . "<div class='card'>
                        <div class='card-title'> $titulo</div>
                        <div class='card-body'> $conteudo</div>
                        <div class='card-footer'>Publicado em:  $data </div>
                      </div>;";
    }
    return $cards;
}
function comboBoxAvisos()
{
    $sql = "SELECT * FROM avisos ORDER BY data_aviso DESC";
    $conexao = conectarBD();
    $resultado = mysqli_query($conexao, $sql);

    $options = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $titulo = $registro["titulo"];
        $id = $registro["id_aviso"];

        $options = $options . "<OPTION value='$id'>$titulo</OPTION>";
    }
    return $options;
}
function excluirAviso($id){
    $sql = "DELETE FROM avisos WHERE id_aviso = $id";

    $conexao = conectarBD();  
    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
}
function criarAviso($titulo,$conteudo,$data){
    $conexao = conectarBD();

        
            $sql = "INSERT INTO avisos (titulo, conteudo, data_aviso) VALUES ('$titulo', '$conteudo', '$data')";
            $select2 = mysqli_query($conexao,$sql);
            $id = mysqli_insert_id($conexao);  
            
            if($select2){
                $mensagem = "aviso $id inserido com sucesso.";
            }
            else{
                $mensagem = "Não foi possível realizar o cadastro.";
            }

        return $mensagem; 
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
    require_once "processoDAO.php";
    require_once "aulaPraticaDAO.php";
    $processo= pegaIDProcesso($id);
    $aulas=pesquisarAulaPorProcesso($processo);
    $datas = array();
    while ($resultado = mysqli_fetch_assoc($aulas)){
        $data_aula = $resultado['data_aula'];
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
    FROM veiculo V
    JOIN vurso C ON V.sigla_categoria = C.categoria
    JOIN processo P ON C.sigla = P.id_curso
    WHERE P.id_processo = '$id_processo';";

    $resultado = mysqli_query($conexao, $sql);

    return $resultado;
}
function pesquisarVeiculoPorCurso($id_curso){
    $conexao = conectarBD(); 
    $sql = 
    "SELECT V.placa, V.sigla_categoria, V.adaptado, V.marca, V.modelo, V.modelo, V.ano
    FROM veiculo V
    JOIN curso C ON V.sigla_categoria = C.categoria
    WHERE C.sigla = '$id_curso';";

    $resultado = mysqli_query($conexao, $sql );

    return $resultado;
}
?>