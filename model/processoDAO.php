<?php
require "conexaoBD.php";
static $conexão;
function iniciarProcesso($curso,$aluno,$data_inicio){
    $conect=conectarBD();
    
    $query1="SELECT * FROM processo WHERE cpf_aluno='$aluno' and curso='$curso';";
    $select1=mysqli_query($conect,$query1);  
    $qtd=mysqli_num_rows($select1);
    if($qtd == 0){
        $query2="INSERT INTO `banco_cfc`.`processo` (`curso`, `cpf_aluno`, `data_inicio`) VALUES ('$curso', '$aluno', '$data_inicio');";
        $select2=mysqli_query($conect,$query2);
        if($select2){
            $mensagem="Processo iniciado!";
        }
        else{
            $mensagem="Não foi possivel iniciar o processo!";
        }
    }
    else{
        $mensagem="Esse processo ja essiste!";
    }
    return $mensagem;
}