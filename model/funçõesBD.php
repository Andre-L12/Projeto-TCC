<?php
require "conexãoBD.php";
static $conexão;
function cadastrarAluno($nome,$cpf,$telefone,$email,){
    $conect=conectarBD();
    $query1="SELECT cpf FROM aluno WHERE cpf='$cpf'";
    $select1=mysqli_query($conect,$query1);  
    $qtd=mysqli_num_rows($select1);
    if($qtd == 0){
        $query2="INSERT INTO `novobanco_cfc`.`aluno` (`nome`, `cpf`, `telefone`, `email`) VALUES ('$nome', '$cpf', '$telefone', '$email');";
        $select2=mysqli_query($conect,$query2);
        if($select2){
            $mensagem="aluno inserido com sucesso!";
        }
        else{
            $mensagem="nao foi possivel realizar o cadastro!";
        }
    }
    else{
        $mensagem="Esse aluno ja essiste!";
    }
    return $mensagem;
}
function deletarAluno($cpf){
    $conect=conectarBD();
    $query="DELETE FROM `novobanco_cfc`.`aluno` WHERE (`cpf` = '$cpf ');";
    $select=mysqli_query($conect,$query);
    if($select){
        $mensagem="aluno exluido com sucesso!";
    }
    else{
        $mensagem="nao foi possivel realizar a operação!";
    } 
    return $mensagem;
}
function exibirAluno($cpf){
    $conect=conectarBD();
    $query="SELECT * FROM `novobanco_cfc`.`aluno` WHERE (`cpf` = '$cpf ');";
    $select=mysqli_query($conect,$query);
    $resultado=mysqli_fetch_array($select);
    $nome=$resultado["nome"];
    $cpf=$resultado["cpf"];
    $telefone=$resultado["telefone"];
    $email=$resultado["email"];
    $qtd=mysqli_num_rows($select);
    if($qtd==1){
        $mensagem="NOME: $nome<br><br>CPF: $cpf<br><br>TElEFONE: $telefone<br><br> EMAIL: $email<br>";
    }
    else{
        $mensagem="nao foi possivel realizar a operação!";
    }
    return $mensagem;
}
function AtualizarAluno($nome1,$nome,$telefone,$email){
    $conect=conectarBD();
    if(($nome !="")&&($telefone !="")&&($email !="")){
        $query1="UPDATE `novobanco_cfc`.`aluno` SET nome ='$nome', telefone ='$telefone', email ='$email'  WHERE (cpf = '$nome1');";
/*if($nome !=""){
    $query1=$query1."nome ='$nome'";
}
if($telefone!=""){
    $query1=$query1."telefone ='$telefone'";
}
if($email != ""){
    $query1=$query1."email ='$email'";
}
    $query1=$query1." WHERE (`cpf` = '$nome1');";*/
        $select1=mysqli_query($conect,$query1);
        if($select1){
            $mensagem="Atuzação concluida";
            header("Location:atuAluno.php?msg=$mensagem");
        }
        else{
            $mensagem="não foi possivel realizar a operação";
            header("Location:atuAluno.php?msg=$mensagem");
        }
    }
    else{
        $mensagem="nada foi alterado";
        header("Location:atuAluno.php?msg=$mensagem");
    }

}
