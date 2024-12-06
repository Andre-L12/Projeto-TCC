<?php
    require "../model/funcoesBD.php";

    // Receber os campos POST:
    $titulo = $_POST["tituloAviso"];

    $conteudo = $_POST["avisoTexto"];
    function obterDataHoje() {
        $data = date("Y-m-d"); // Formato: Ano-Mês-Dia (padrão ISO 8601)
        return $data;
    }
    
    $data = obterDataHoje();
   
    $msg="";
    if (isset($titulo)==false){
        $msg=$msg."Adicione um titulo no aviso!";
    }
    if (isset($conteudo)==false){
        $msg=$msg."Adicione escreva algo no aviso!";
    }

    if(empty($msg)){

            // Inserir aviso
            $id = criarAviso($titulo,$conteudo,$data);

            // Devolver mensagem
            header("Location:../view/menu-funcionario.php?msg=$id");
        
    } else {
        // Devolver mensagem ERRO
        header("Location:../view/menu-funcionario.php?msg=$msg");
    }

?>