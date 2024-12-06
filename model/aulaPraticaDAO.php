<?php
require_once "conexaoBD.php";
static $conexao;

function cadastrarAulaPratica($id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria)
{
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

function alterarAulaPratica($id, $id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria, $status_detran){
    $conexao = conectarBD();

    if ($obrigatoria == 0) {
        $status_detran = 0;
    } else {
        $status_detran = 1;
    }

    $sql = "UPDATE aulapratica SET "
        . "data_aula = '$data', "
        . "hora_aula = '$hora', "
        . "status_detran = '$status_detran', "
        . "obrigatoria = '$obrigatoria', "
        . "id_veiculo = '$id_veiculo', "
        . "id_instrutor = '$id_instrutor', "
        . "id_processo = '$id_processo' "
        . "WHERE id_aulaPratica = $id";

        mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );

        return $id;

}

function excluirAulaPratica($id){
    $sql = "DELETE FROM aulapratica WHERE id_aulaPratica = $id";

    $conexao = conectarBD();  
    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
}

function pesquisarAula($pesq, $tipo)
{

    $conexao = conectarBD();

    $sql = "SELECT * FROM aulapratica WHERE ";
    switch ($tipo) {
        case 0:
            $sql = "SELECT ap.*,
                            a.nome,
                            p.id_processo,
                            v.placa,
                            v.marca,
                            v.modelo,
                            i.nome AS nome_instrutor
                    FROM 
                            `BANCO_CFC`.`AulaPratica` ap
                        INNER JOIN 
                            `BANCO_CFC`.`Processo` p ON ap.id_processo = p.id_processo
                        INNER JOIN 
                            `BANCO_CFC`.`Aluno` a ON p.id_aluno = a.id_aluno
                        INNER JOIN 
                            `BANCO_CFC`.`Veiculo` v ON ap.id_veiculo = v.placa
                        INNER JOIN 
                            `BANCO_CFC`.`Instrutor` i ON ap.id_instrutor = i.id_instrutor";
            break;
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
            $sql = "SELECT ap.*,
                            a.nome,
                            p.id_processo,
                            v.placa,
                            v.marca,
                            v.modelo,
                            i.nome AS nome_instrutor
                    FROM 
                            `BANCO_CFC`.`AulaPratica` ap
                        INNER JOIN 
                            `BANCO_CFC`.`Processo` p ON ap.id_processo = p.id_processo
                        INNER JOIN 
                            `BANCO_CFC`.`Aluno` a ON p.id_aluno = a.id_aluno
                        INNER JOIN 
                            `BANCO_CFC`.`Veiculo` v ON ap.id_veiculo = v.placa
                        INNER JOIN 
                            `BANCO_CFC`.`Instrutor` i ON ap.id_instrutor = i.id_instrutor
                    WHERE ap.id_processo = '$pesq' ";
            break;
        case 4: // Por placa
            $sql = $sql . "id_veiculo = '$pesq' ";
            break;
        case 5: // Por status no detran
            $sql = $sql . "status_detran = '$pesq' ";
            break;
        case 6: // Por data
            $sql = "SELECT ap.*,
                            a.nome,
                            p.id_processo,
                            v.placa,
                            v.marca,
                            v.modelo,
                            i.nome AS nome_instrutor
                    FROM `BANCO_CFC`.`AulaPratica` ap
                    INNER JOIN 
                            `BANCO_CFC`.`Processo` p ON ap.id_processo = p.id_processo
                    INNER JOIN 
                            `BANCO_CFC`.`Aluno` a ON p.id_aluno = a.id_aluno
                    INNER JOIN 
                            `BANCO_CFC`.`Veiculo` v ON ap.id_veiculo = v.placa
                    INNER JOIN 
                            `BANCO_CFC`.`Instrutor` i ON ap.id_instrutor = i.id_instrutor
                    WHERE data_aula = '$pesq'";
            break;
        case 7: // Por ID
                $sql = $sql . "id_aulaPratica = '$pesq' ";
                break;
        case 8: // Por ID Aluno
                $sql = "SELECT ap.*, a.id_aluno, a.nome, c.categoria, i.nome AS nome_instrutor
                FROM `BANCO_CFC`.`AulaPratica` ap
                JOIN `BANCO_CFC`.`Processo` p ON ap.id_processo = p.id_processo
                JOIN `BANCO_CFC`.`Aluno` a ON p.id_aluno = a.id_aluno
                JOIN `BANCO_CFC`.`Curso` c ON p.id_curso = c.sigla
                JOIN `BANCO_CFC`.`Instrutor` i ON ap.id_instrutor = i.id_instrutor
                WHERE a.id_aluno = '$pesq';";
                break;
        case 9: // Por ID Instrutor
            $sql = "SELECT ap.*, a.id_aluno, a.nome, c.categoria, i.nome AS nome_instrutor
                FROM `BANCO_CFC`.`AulaPratica` ap
                JOIN `BANCO_CFC`.`Processo` p ON ap.id_processo = p.id_processo
                JOIN `BANCO_CFC`.`Aluno` a ON p.id_aluno = a.id_aluno
                JOIN `BANCO_CFC`.`Curso` c ON p.id_curso = c.sigla
                JOIN `BANCO_CFC`.`Instrutor` i ON ap.id_instrutor = i.id_instrutor
                WHERE ap.id_instrutor = '$pesq';";
                break;
        case 10: // por nome de aluno
            $sql = "SELECT ap.*,
                            a.nome,
                            p.id_processo,
                            v.placa,
                            v.marca,
                            v.modelo,
                            i.nome AS nome_instrutor
                        FROM 
                            `BANCO_CFC`.`AulaPratica` ap
                        INNER JOIN 
                            `BANCO_CFC`.`Processo` p ON ap.id_processo = p.id_processo
                        INNER JOIN 
                            `BANCO_CFC`.`Aluno` a ON p.id_aluno = a.id_aluno
                        INNER JOIN 
                            `BANCO_CFC`.`Veiculo` v ON ap.id_veiculo = v.placa
                        INNER JOIN 
                            `BANCO_CFC`.`Instrutor` i ON ap.id_instrutor = i.id_instrutor
                        WHERE 
                            a.nome LIKE '%$pesq%'
                ";
                break;
        case 11: // Por nome de instrutor
            $sql = "SELECT ap.*,
                            a.nome,
                            p.id_processo,
                            v.placa,
                            v.marca,
                            v.modelo,
                            i.nome AS nome_instrutor
                    FROM 
                        AulaPratica ap
                    INNER JOIN 
                        Instrutor i ON ap.id_instrutor = i.id_instrutor
                    INNER JOIN 
                        Processo p ON ap.id_processo = p.id_processo
                    INNER JOIN 
                        Aluno a ON p.id_aluno = a.id_aluno
                    INNER JOIN 
                        Veiculo v ON ap.id_veiculo = v.placa
                    WHERE 
                        i.nome LIKE '%$pesq%' 
                    ORDER BY 
                        ap.data_aula ASC, ap.hora_aula ASC;
            ";

    }

    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return $res;
}

function pesquisarAulaPorCPFAluno($pesq)
{
    return pesquisarAula($pesq, 1);
}
function pesquisarAulaPorInstrutor($pesq)
{
    return pesquisarAula($pesq, 2);
}

function pesquisarAulaPorProcesso($pesq)
{
    return  pesquisarAula($pesq, 3);
}

function pesquisarAulaPorPlaca($pesq)
{
    return  pesquisarAula($pesq, 4);
}
function pesquisarAulaPorStatus($pesq)
{
    return  pesquisarAula($pesq, 5);
}
function pesquisarAulaPorData($pesq)
{
    return  pesquisarAula($pesq, 6);
}
function pesquisarAulaPorId($pesq)
{
    return  pesquisarAula($pesq, 7);
}

function pesquisarAulaPorIDAluno ($pesq) {
    return  pesquisarAula($pesq,8);
}
function pesquisarAulaPorIDInstrutor ($pesq) {
    return  pesquisarAula($pesq,9);
}

function pesquisarAulaPorNomeAluno ($pesq) {
    return  pesquisarAula($pesq,10);
}

function pesquisarAulaPorNomeInstrutor ($pesq) {
    return  pesquisarAula($pesq,11);
}

function pesquisarAulaPorInstrutorData($id_instrutor, $data)
{
    $conexao = conectarBD();

    $sql = "SELECT * FROM aulapratica WHERE id_instrutor = '$id_instrutor' AND data_aula = '$data'";

    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return $res;
}
function pesquisarAulaPorIdData($id, $data)
{
    $conexao = conectarBD();

    $sql = "SELECT 
    a.nome AS nome_aluno,
    a.cpf AS cpf_aluno,
    p.data_inicio AS data_inicio_processo,
    ap.data_aula AS data_aula,
    ap.hora_aula AS hora_aula,
    ap.status_aula AS status_aula,
    v.placa AS placa_veiculo,
    v.marca AS marca_veiculo,
    v.modelo AS modelo_veiculo,
    i.nome AS nome_instrutor
FROM 
    AulaPratica ap
INNER JOIN 
    Processo p ON ap.id_processo = p.id_processo
INNER JOIN 
    Aluno a ON p.id_aluno = a.id_aluno
INNER JOIN 
    Veiculo v ON ap.id_veiculo = v.placa
INNER JOIN 
    Instrutor i ON ap.id_instrutor = i.id_instrutor
WHERE 
    a.id_aluno = '$id' -- Substitua pelo ID do aluno
    AND ap.data_aula = '$data'; -- Substitua pela data desejada";

    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return $res;
}

