<?php
require "conexaoBD.php";
static $conexao;

function cadastrarAulaPratica($cpf_aluno, $cpf_instrutor, $placa, $id_processo, $data, $hora, $obrigatoria, $status) {
    // Conectar ao banco de dados
    $conect = conectarBD();

    // Verificar se já existe uma aula com os mesmos parâmetros
    $query1 = "SELECT * FROM aulapratica WHERE cpf_aluno='$cpf_aluno' AND hora='$hora' AND data_aula='$data';";
    $select1 = mysqli_query($conect, $query1);
    $qtd = mysqli_num_rows($select1);

    if ($qtd == 0) {
        // Inserir a nova aula prática
        $query2 = "INSERT INTO `banco_cfc`.`aulapratica` 
                   (`cpf_instrutor`, `cpf_aluno`, `id_processo`, `placa`, `data_aula`, `hora`, `status_detran`, `obrigatoria`) 
                   VALUES ('$cpf_instrutor', '$cpf_aluno', '$id_processo', '$placa', '$data', '$hora', '$status', '$obrigatoria');";
        
        $select2 = mysqli_query($conect, $query2);
        $id = mysqli_insert_id($conect);

        if ($select2) {
            $mensagem = "Aula $id inserida com sucesso.";
        } else {
            $mensagem = "Não foi possível realizar o cadastro.";
        }
    } else {
        $mensagem = "Essa aula já existe.";
    }

    return $mensagem;
}
function pesquisarAulaPorAluno($pesq) {
    $conexao = conectarBD(); 
    $sql = "SELECT * FROM aulapratica WHERE cpf_aluno LIKE '%$pesq%' ";
    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
    
}
?>
