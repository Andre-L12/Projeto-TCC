<?php
require_once "../model/funcoesBD.php"; // Certifique-se de que o caminho está correto

        if (isset($_GET['data'])) {
            $data = $_GET['data'];
            
            // Função que busca as informações da aula no banco de dados para a data especificada
            $aulaInfo = pesquisarAulaPorData($data); // Nome da função que você já deve ter ou criar

            if ($aulaInfo) {
                echo json_encode($aulaInfo); // Retorna os dados em JSON
            } else {
                echo json_encode(["erro" => "Nenhuma aula encontrada para essa data."]);
            }
    

        if ( mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "alunos" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ( $row = mysqli_fetch_assoc($resultado) ) {
                $id = $row["id_aluno"];
                $nome = $row["nome"];
                $cpf = $row["cpf"];
                $email = $row["email"];
                $celular = $row["celular"];
                $foto = $row["foto"];
                $imageBase64 = base64_encode($foto);      // Converter a imagem em binário para Base64
                
                $registros["alunos"][] = array(
                        "id_aluno" => $id,
                        "nome" => $nome,
                        "cpf" => $cpf,
                        "email" => $email,
                        "celular" => $celular,
                        "foto" => $imageBase64
                        );

            }

            // Envia os dados como JSON (uma lista de produtos)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // Produto não encontrado
            echo json_encode(['erro' => 'Aluno não encontrado.']);
        }
    

} else {
echo json_encode(['erro' => 'ERRO ao pesquisar Alunos.']);
}
?>
