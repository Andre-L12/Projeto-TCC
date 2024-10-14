<?php
require_once "conexaoBD.php";
static $conexao;

function cadastrarAulaPratica($id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria) {
    // Conectar ao banco de dados
    $conect = conectarBD();

    // Verificar se já existe uma aula com os mesmos parâmetros
    $query1 = "SELECT * FROM aulapratica WHERE id_processo='$id_processo' AND hora_aula='$hora' AND data_aula='$data';";
    $select1 = mysqli_query($conect, $query1);
    $qtd = mysqli_num_rows($select1);

    if ($qtd == 0) {
        // Inserir a nova aula prática
        $query2 = "INSERT INTO `banco_cfc`.`aulapratica` 
                   (`data_aula`, `hora_aula`, `status_detran`, `obrigatoria`, `status_aula`, `id_veiculo`, `id_instrutor`, `id_processo`) 
                   VALUES ('$data', '$hora', 0, '$obrigatoria', 'Marcada', '$id_veiculo', '$id_instrutor', '$id_processo');";
        
        $select2 = mysqli_query($conect, $query2);
        $id = mysqli_insert_id($conect);

        if ($select2) {
            $mensagem = "Aula $id inserida com sucesso.";
        } else {
            $mensagem = "Não foi possível realizar o agendamento.";
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
        case 1: // Por CPF aluno
                $sql = "SELECT ap.*
                FROM `BANCO_CFC`.`AulaPratica` ap
                JOIN `BANCO_CFC`.`Processo` p ON ap.id_processo = p.id_processo
                JOIN `BANCO_CFC`.`Aluno` a ON p.id_aluno = a.id_aluno
                WHERE a.cpf = '$pesq';";
                break;
        case 2: // Por cpf instrutor
                $sql = $sql . "cpf_instrutor = '$pesq' ";
                break;
        case 3: // Por pelo processo
                $sql = $sql . "id_processo = '$pesq' ";
                break;
        case 4: // Por placa
                $sql = $sql . "id_veiculo = '$pesq' ";
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

function pesquisarAulaPorCPFAluno($pesq) {
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

function pesquisarAulaPorInstrutorData($id_instrutor, $data){
    $conexao = conectarBD();

    $sql = "SELECT * FROM aulapratica WHERE id_instrutor = '$id_instrutor' AND data_aula = '$data'";

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );

    return $res;
}

?>
