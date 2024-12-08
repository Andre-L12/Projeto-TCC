
<?php
function conectarBD(){
    // $host="bancocfc.cztq4u6ge5ld.us-east-1.rds.amazonaws.com";
    // $user="admin";
    // $senha="aev01062427";
    // $database="BANCO_CFC";
     $host="127.0.0.1";
     $user="root";
     $senha="";
     $database="banco_cfc";

    // conexao bd
    $conexao = mysqli_connect($host,$user,$senha,$database) or die("Erro ao conectar com o banco de dados.");
    
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, "SET character_set_connection=utf8");
    mysqli_query($conexao, "SET character_set_client=utf8");
    mysqli_query($conexao, "SET character_set_results=utf8"); 
    
    return $conexao;  
}
?>