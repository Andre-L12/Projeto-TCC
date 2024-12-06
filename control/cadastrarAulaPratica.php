<?php
    require_once "funçoesUteis.php";
    require_once "../model/aulaPraticaDAO.php";

    // Receber os campos POST:
    $acao = $_POST["btnCadastrar"];

    $id_aula = "";
    if (isset($_POST["id"])){
        $id_aula = $_POST["id"];
    }

    $id_processo = $_POST["processo"];
    $id_instrutor = $_POST["instrutor"];
    $id_veiculo = $_POST["veiculo"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $obrigatoria = $_POST["obrigatoria"];

    $status_detran = "";
    if (isset($_POST["statusDetran"])) {
        $status_detran = $_POST["statusDetran"];
    }

    // Validação de dados:
    $msg = validarAula($id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria);

    if (empty($msg)){

        if ($acao == "Agendar") {
            // Inserir Aula
            $id = cadastrarAulaPratica($id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria);
            
            // Devolver mensagem
            header("Location:../view/cadastrar-aula.php?msg=$id");
        } else {
            // Alterar dados de Aula
            $id = alterarAulaPratica($id_aula, $id_processo, $id_instrutor, $id_veiculo, $data, $hora, $obrigatoria, $status_detran);

            // Devolver mensagem
            header("Location:../view/cadastrar-aula.php?msg=Aula prática $id alterada com sucesso.");
        }

    } else {
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-aula.php?msg=$msg");
    }
    
    
?>