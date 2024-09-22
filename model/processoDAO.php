<?php
require_once "conexaoBD.php";
static $conexão;
function iniciarProcesso($curso,$aluno,$data_inicio){
    $conect=conectarBD();
    
    $query1="SELECT * FROM processo WHERE cpf_aluno='$aluno' and curso='$curso';";
    $select1=mysqli_query($conect,$query1);  
    $qtd=mysqli_num_rows($select1);
    if($qtd == 0){
        $query2="INSERT INTO `banco_cfc`.`processo` (`curso`, `cpf_aluno`, `data_inicio`) VALUES ('$curso', '$aluno', '$data_inicio');";
        $select2=mysqli_query($conect,$query2);
        $id = mysqli_insert_id($conect);
        
        if($select2){
            $mensagem="Processo $id iniciado!";
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
function pegaIDProcesso($cpf){
    $conect=conectarBD();
    $query1="SELECT * FROM processo WHERE cpf_aluno='$cpf';";
    $select1=mysqli_query($conect,$query1); 
    $registro = mysqli_fetch_assoc($select1);
        // Pegar os campos do REGISTRO
        $id_processo = $registro["id_processo"];
    return $id_processo;

}