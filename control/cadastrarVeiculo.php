<?php
    require "funçoesUteis.php";
    require "../model/veiculoDAO.php";

    $sigla = $_POST["categoria"];
    $adaptado = $_POST["adaptado"];
    $placa = $_POST["txtPlaca"];
    $marca = $_POST["txtMarca"];
    $modelo = $_POST["txtModelo"];
    $ano = $_POST["ano"];

    $msg = "";

    $veiculoExiste = veiculoExiste($placa);

    if (!$veiculoExiste){
        $msg = validarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano);
    } else {
        $msg = "Esse veículo já está cadastrado.";
    }

    if(empty($msg)){
        //Tratando dados
        $marca = trim($marca);
        $modelo = trim($modelo);    

        //Inserindo dados no banco
        $id = criarVeiculo($sigla, $adaptado, $placa, $marca, $modelo, $ano);

        //Devolvendo mensagem
        header("Location:../view/base/form-cadastrar-veiculo.php?msg=Cadastro de veículo $id realizado com sucesso.");
    } else {
        header("Location:../view/base/form-cadastrar-veiculo.php?msg=$msg");
    }
?>