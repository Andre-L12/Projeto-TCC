<?php
    require "funçoesUteis.php";
    require "../model/veiculoDAO.php";

    $acao = $_POST["btnCadastrar"];

    $sigla = $_POST["categoria"];
    $adaptado = $_POST["adaptado"];
    $placa = $_POST["txtPlaca"];
    $marca = $_POST["txtMarca"];
    $modelo = $_POST["txtModelo"];
    $ano = $_POST["ano"];

    $msg = validarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano);

    if(empty($msg)){
        //Tratando dados
        $marca = trim($marca);
        $modelo = trim($modelo);
        
        if ($acao == "Cadastrar"){
            //Inserindo dados no banco
            $id = criarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano);

            //Devolvendo mensagem
            header("Location:../view/cadastrar-veiculo.php?msg= $id");
        } else {
            $id = alterarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano);

            header("Location:../view/cadastrar-veiculo.php?msg=Veículo $id alterado com sucesso.");
        }
        
    } else {
        header("Location:../view/cadastrar-veiculo.php?msg=$msg");
    }
?>