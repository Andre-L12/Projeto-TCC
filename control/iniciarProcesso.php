<?php
    
    require "../model/processoDAO.php";

    $curso =$_POST["curso"];
    $aluno =$_POST["aluno"];
    $data_inicio=$_POST["data_inicio"];
 
        //Inserindo dados no banco
        $id = iniciarProcesso($curso,$aluno,$data_inicio);

        //Devolvendo mensagem
        header("Location:../view/cadastrar-processo.php?msg= $id");
?>