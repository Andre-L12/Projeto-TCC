<?php
    require_once "funçoesUteis.php";
    require_once "../model/aulaPraticaDAO.php";

    // Receber os campos POST:
    $cpf_instrutor=$_POST["instrutor"];
    $cpf_aluno=$_POST["aluno"];
    $placa=$_POST["veiculo"];
    $data=$_POST["data"];
    $hora=$_POST["hora"];
    $obrigatoria=$_POST["obrigatoria"];
    $status=$_POST["status_detran"];

    require_once "../model/processoDAO.php";
    $id_processo = pegaIDProcesso($cpf_aluno); // Dá erro se um aluno tiver mais que um processo
    
    //Inserindo dados no banco
    $id = cadastrarAulaPratica($cpf_aluno,$cpf_instrutor,$placa,$id_processo,$data,$hora,$obrigatoria,$status);
    //Devolvendo mensagem
    header("Location:../view/cadastrar-aula.php?msg=$id");
?>