<?php
require_once "conexaoBD.php";
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
function pesquisarAula($pesq, $tipo) {
    
    $conexao = conectarBD(); 

    $sql = "SELECT * FROM aulapratica WHERE ";
    switch ($tipo) {
        case 1: // Por cpf aluno
                $sql = $sql . "cpf_aluno LIKE '$pesq%' ";
                break;
        case 2: // Por cpf instrutor
                $sql = $sql . "cpf_instrutor = '$pesq' ";
                break;
        case 3: // Por pelo processo
                $sql = $sql . "id_processo = '$pesq' ";
                break;
        case 4: // Por placa
                $sql = $sql . "placa = '$pesq' ";
                break;
        case 5: // Por status no detran
                $sql = $sql . "status_detran = '$pesq' ";
                break;
        case 6: // Por data
                $sql = $sql . "data_aula = '$pesq' ";
                break;
        case 7: // Por ID
                $sql = $sql . "id = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisarAulaPorAluno($pesq) {
    return pesquisarAula($pesq,1);
    
}
function pesquisarAulaPorInstrutor ($pesq) {
    return pesquisarAula($pesq,2);
}

function pesquisarAulaPorProcesso ($pesq) {
    return  pesquisarAula($pesq,3);
}

function pesquisarAulaPorPlaca ($pesq) {
    return  pesquisarAula($pesq,4);
}
function pesquisarAulaPorStatus ($pesq) {
    return  pesquisarAula($pesq,5);
}
function pesquisarAulaPorData ($pesq) {
    return  pesquisarAula($pesq,6);
}
function pesquisarAulaPorId ($pesq) {
    return  pesquisarAula($pesq,7);
}
?>
