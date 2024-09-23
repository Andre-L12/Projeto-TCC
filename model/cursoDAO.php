<?php
    
    require_once "conexaoBD.php";
    function comboBoxCursos(){
        
        $conexao = conectarBD();

        $sql = "SELECT * FROM curso";
        $resultado = mysqli_query($conexao, $sql );

        $options = "";
        while (  $registro = mysqli_fetch_assoc($resultado)  ) {
            // Pegar os campos do REGISTRO
            $sigla = $registro["sigla"];
            $descricao = $registro["descricao"];

            $options = $options . "<OPTION value='$sigla'>$descricao</OPTION>";
        }

        return $options;

    }
    function pesquisarCS ($pesq, $tipo) {

        $conexao = conectarBD(); 
    
        $sql = "SELECT * FROM curso WHERE ";
        switch ($tipo) {
            case 1: // Por nome
                    $sql = $sql . "sigla LIKE '$pesq%' ";
                    break;
            case 2: // Por CPF
                    $sql = $sql . "descricao = '$pesq' ";
                    break;
            case 3: // Por ID
                $sql = $sql . "categoria = '$pesq' ";
        }
    
        $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
        return $res;
    }
    
    function pesquisarCursoPorSigla ($pesq) {
        return pesquisarCS($pesq,1);
    }
    
    //function pesquisarClientePorEstado ($pesq) {
       // return pesquisar($pesq,2);}
    
    function pesquisarCursoPorDescricao ($pesq) {
        return pesquisarCS($pesq,2);
    }
    
    function pesquisarCursoPorCategoria ($pesq) {
        return pesquisarCS($pesq,3);
    }
?>