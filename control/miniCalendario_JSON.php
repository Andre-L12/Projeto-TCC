<?php
require_once "../model/funcoesBD.php"; // Certifique-se de que o caminho está correto

if (isset($_GET['data']) && isset($_GET['id'])) {
    $data = $_GET['data'];
    $id = $_GET['id'];

    // Função que busca as informações da aula no banco de dados para a data especificada
    $resultado = pesquisarAulaPorIdData($id, $data); // Nome da função que você já deve ter ou criar

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Cria um array para armazenar todos os resultados
        $registros = array(
            "erro" => "",
            "aula" => array()
        );  

        // Percorre todos os resultados e os adiciona ao array
        while ($row = mysqli_fetch_assoc($resultado)) {
            $registros["aula"][] = array(
                "id_aula" => $row["id_aulaPratica"],
                "data" => $row["data_aula"],
                "hora" => $row["hora_aula"],
                "obrigatoria" => $row["obrigatoria"],
                "placa" => $row["id_veiculo"],
                "instrutor" => $row["nome_instrutor"],
                "marca" => $row["marca_veiculo"],
                "modelo" => $row["modelo_veiculo"],
                "processo" => $row["id_processo"]
            );
        }

        // Envia os dados como JSON
        header('Content-Type: application/json');
        echo json_encode($registros);
    } else {
        // Nenhum registro encontrado
        echo json_encode(['erro' => 'Nenhuma aula encontrada para essa data.']);
    }
} else {
    // Parâmetros não fornecidos corretamente
    echo json_encode(['erro' => 'Parâmetros inválidos.']);
}
?>
