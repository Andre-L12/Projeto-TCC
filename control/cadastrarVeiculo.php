<?php
    require "funçoesUteis.php";
    require "../model/veiculoDAO.php";

    // Receber os campos POST:
    $acao = $_POST["btnCadastrar"];

    $sigla = $_POST["categoria"];
    $adaptado = $_POST["adaptado"];
    $placa = $_POST["txtPlaca"];
    $marca = $_POST["txtMarca"];
    $modelo = $_POST["txtModelo"];
    $ano = $_POST["ano"];

    // Validação de dados:
    $msg = validarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano);

    if(empty($msg)){
        //Tratando dados
        $marca = trim($marca);
        $modelo = trim($modelo);
        
        if ($acao == "Cadastrar"){
            // Inserir Veículo
            $id = criarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano);

            // Devolver mensagem
            header("Location:../view/cadastrar-veiculo.php?msg= $id");
        } else {
            // Alterar dados de Veículo
            $id = alterarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano);
            
            // Devolver mensagem
            header("Location:../view/cadastrar-veiculo.php?msg=Veículo $id alterado com sucesso.");
        }
        
    } else {
        // Devolver mensagem ERRO
        header("Location:../view/cadastrar-veiculo.php?msg=$msg");
    }
?>