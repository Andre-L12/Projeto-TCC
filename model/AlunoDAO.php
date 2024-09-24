<?php
require "conexaoBD.php";
static $conexão;
function cadastrarAluno($nome, $cpf, $email,$celular,$foto){
    $conect=conectarBD();

    $tamanhoImg = $foto["size"]; 
    $arqAberto = fopen ( $foto["tmp_name"], "r" );
    $midia = addslashes( fread ( $arqAberto , $tamanhoImg ) );
    
    $query1="SELECT cpf FROM aluno WHERE cpf='$cpf'";
    $select1=mysqli_query($conect,$query1);  
    $qtd=mysqli_num_rows($select1);
    if($qtd == 0){
        $query2="INSERT INTO `banco_cfc`.`aluno` (`email`, `celular`, `cpf`, `nome`,`foto`) VALUES ('$email', '$celular', '$cpf', '$nome', '$midia');";
        $select2=mysqli_query($conect,$query2);
        $id = mysqli_insert_id($conect);  
        if($select2){
            $mensagem="Aluno $id inserido com sucesso.";
        }
        else{
            $mensagem="Não foi possível realizar o cadastro.";
        }
    }
    else{
        $mensagem="Esse aluno já existe.";
    }
    return $mensagem;
}

function alterarAluno ($id, $nome, $cpf, $email, $celular, $foto) {

    $conexao = conectarBD();

    $conexao = conectarBD();
    
   
    // Transformar a imagem //se der erro tirar essa parte
    // $tamanhoImg = $foto["size"]; 
    // $arqAberto = fopen ( $foto["tmp_name"], "r" );
    // $midia = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    // Montar SQL
    $sql = "UPDATE aluno SET "
    . "nome = '$nome', "
    . "cpf = '$cpf', "
    . "email = '$email', "
    . "celular = '$celular'";

    if ($foto != null) {
        // Transformar a imagem
        $tamanhoImg = $foto["size"]; 
        $arqAberto = fopen ( $foto["tmp_name"], "r" );
        $midia = addslashes( fread ( $arqAberto , $tamanhoImg ) );

        // Montar SQL com foto
        $sql = $sql . ", foto = '$midia'"
                       . " WHERE id = $id";
    } else {
        // Não alterar a foto
        $sql = $sql . " WHERE id = $id";
    }

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) ); // Inserir no banco
    
    return $id;
}

function excluirAluno ( $id ) {
    $sql = "DELETE FROM aluno WHERE id = $id";

    $conexao = conectarBD();  
    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );

}
function pesquisarAluno($pesq) {
    $conexao = conectarBD(); 
    $sql = "SELECT * FROM Aluno WHERE nome LIKE '%$pesq%' ";
    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
    
}
function pesquisar ($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM aluno WHERE ";
    switch ($tipo) {
        case 1: // Por nome
                $sql = $sql . "nome LIKE '$pesq%' ";
                break;
        case 2: // Por CPF
                $sql = $sql . "cpf = '$pesq' ";
                break;
        case 3: // Por ID
            $sql = $sql . "id = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisarAlunoPorNome ($pesq) {
    return pesquisar($pesq,1);
}

//function pesquisarClientePorEstado ($pesq) {
   // return pesquisar($pesq,2);}

function pesquisarAlunoPorCPF ($pesq) {
    return pesquisar($pesq,2);
}

function pesquisarAlunoPorID ($pesq) {
    return pesquisar($pesq,3);
}

/*function deletarAluno($cpf){
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
    $query1=$query1." WHERE (`cpf` = '$nome1');";
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

}*/
